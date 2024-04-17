<?php

namespace App\Helpers;

use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CourseHelper
{
    public static function updateLessonsStartCount($course)
    {
        $lessons = Lesson::with([
            'user' => function ($query) {
                $query->where('user_id', request()->user()->id);
            }
        ])->where('course_id', $course->id)->get();

        $isStartCourse = false;

        foreach ($lessons as $item) {
            if ($item->user) {
                $isStartCourse = true;
            }
        }

        if ($isStartCourse == false) {
            $course->lessons_start_count++;
            $course->save();
        }
    }

    public static function updateLessonsEndCount($lesson)
    {
        if ($lesson->isLast()) {
            $lesson->course->lessons_end_count++;
            $lesson->course->save();
        }
    }

    public static function getCertificateType($course_id, $user_id)
    {
        $lessons = Lesson::with([
            'test.answer' => function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            },
            'user' => function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            }
        ])->orderBy('number')->where('course_id', $course_id)->get();

        $isAdvanced = true;
        $isBasic = true;

        foreach ($lessons as $lesson) {
            if (!$lesson->isPassed()) {
                $isAdvanced = false;
                $isBasic = false;

                break;
            } else if ($lesson->test) {
                if (!$lesson->test->answer) {
                    $isAdvanced = false;
                }
            }
        }

        return (object) [
            'isAdvanced' => $isAdvanced,
            'isBasic' => $isBasic,
        ];
    }

    public static function certificateStore($course_id, $user_id, $type)
    {
        $notificateSend = false;

        $CourseCertificate = Certificate::where([
            'course_id' => $course_id,
            'user_id' => $user_id,
        ])->first();

        if ($CourseCertificate) {
            if ($CourseCertificate->isAdvanced != $type->isAdvanced) {
                $CourseCertificate->isAdvanced = $type->isAdvanced;
                $CourseCertificate->save();

                $notificateSend = true;
            }
        } else {
            Certificate::create([
                'course_id' => $course_id,
                'user_id' => $user_id,
                'isAdvanced' => $type->isAdvanced
            ]);

            $notificateSend = true;
        }

        if ($notificateSend) {
            Notification::create([
                'is_read' => 0,
                'user_id' => $user_id,
                'type_id' => 5,
                'notificateable_id' => $course_id,
                'notificateable_type' => 'App\Models\Course',
            ]);

            if (OpinionHelper::hasAnswer($course_id, $user_id)) {
                self::sendCertificateMail($user_id, $course_id);
            }
        }

        return $notificateSend;
    }

    public static function sendCertificateMail($user_id, $course_id)
    {
        $user = User::find($user_id);

        try {
            Mail::to($user)->send(new CertificateMail($user, Course::find($course_id)));
        } catch (Exception $e) {
            Log::info('Не отправился сертификат: ' . $user->email . ', ' . $e->getMessage());
        }
    }

    public static function checkCertificate($course_id, $user_id)
    {
        $getCertificateType = CourseHelper::getCertificateType($course_id, $user_id);

        if ($getCertificateType->isAdvanced || $getCertificateType->isBasic) {
            return CourseHelper::certificateStore(
                $course_id,
                $user_id,
                $getCertificateType
            );
        }

        return false;
    }

    public static function playlist($course_id)
    {
        // Получить уроки курса
        $lessons = Lesson::with([
            'test',
            'test.answer' => function ($query) {
                $query->where('user_id', request()->user()->id);
            },
            'user' => function ($query) {
                $query->where('user_id', request()->user()->id);
            }
        ])->orderBy('number')->where('course_id', $course_id)->get();

        // Проставить статусы к урокам
        $passedPrevTest = true;
        $isOpenPrevLesson = true;
        $isPassedPrevLesson = true;
        foreach ($lessons as &$itemLesson) {
            if ($passedPrevTest == false) {
                $itemLesson->passedPrevTest = false;
            } else {
                if ($itemLesson->test) {
                    if ($itemLesson->test->answer) {
                        if (!$itemLesson->test->answer->correct_answers_count) {
                            $passedPrevTest = false;
                        }
                    } else {
                        $passedPrevTest = false;
                    }
                }
            }

            $itemLesson->isOpenPrevLesson = $isOpenPrevLesson;
            $itemLesson->isPassedPrevLesson = $isPassedPrevLesson;
            $isOpenPrevLesson = $itemLesson->isOpen();
            $isPassedPrevLesson = $itemLesson->isPassed();

            $itemLesson->status = $itemLesson->getStatus();
        }

        return $lessons;
    }
}
