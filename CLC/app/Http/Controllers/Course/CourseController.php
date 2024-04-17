<?php

namespace App\Http\Controllers\Course;

use App\Classes\Constructor;
use App\Classes\ProgressMap;
use App\Helpers\CourseHelper;
use App\Helpers\LessonAnalyticHelper;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\Opinion;
use App\Models\Test;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::latest()->first();

        return redirect(Route('course.show', $course->id));
    }

    public function show(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            abort(404);
        }

        $lesson = $request->lesson_id
            ? Lesson::with([
                'user' => function ($query) {
                    $query->where('user_id', request()->user()->id);
                }
            ])->find($request->lesson_id)
            : Lesson::with([
                'user' => function ($query) {
                    $query->where('user_id', request()->user()->id);
                }
            ])->orderBy('number')->first();

        if (!$lesson) {
            abort(404);
        }

        $prevLesson = $lesson->prev();
        $prevTest = $prevLesson ? Test::with(['answer' => function ($query) {
            $query->where('user_id', request()->user()->id);
        }])->where('lesson_id', $prevLesson->id)->first() : null;

        if ($prevTest) {
            if (
                !isset($prevTest->answer->correct_answers_count) || !$prevTest->answer->correct_answers_count
            ) {
                $lesson->passedPrevTest = false;
            }
        }

        if ($prevLesson) {
            $lesson->isOpenPrevLesson = $prevLesson->isOpen();
            $lesson->isPassedPrevLesson = $prevLesson->isPassed();
        }

        if (!$lesson->access()) {
            return redirect(Route('course.show', $course->id));
        }

        $test = Test::with(['answer' => function ($query) {
            $query->where('user_id', request()->user()->id);
        }])->where('lesson_id', $lesson->id)->first();

        // Обновление счетчика начала курса
        CourseHelper::updateLessonsStartCount($course);

        // Статус о открытии урока
        $lessonUser = $lesson->getUser();
        if (!$lessonUser) {
            $lessonUser = $lesson->setUser();
        }

        // Список уроков
        $lessons = CourseHelper::playlist($course->id);

        // Карта модулей с уроками
        $progressMap = ProgressMap::get($lessons);

        // Номера уроков без дз
        $noHomeworkNumbers = [];

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

            if ($itemLesson->test) {
                if (!$itemLesson->test->answer) {
                    $noHomeworkNumbers[] = $itemLesson->number;
                }
            }
        }

        // Ответ
        $answer = $test ? $test->answer : null;

        // Просмотренные сегменты видео
        $lessonUser->videoViewedSegments = json_encode($lessonUser->videoViewedSegments);

        // Аналитика
        LessonAnalyticHelper::store($lesson);

        // Рефлексия
        $opinion = Opinion::where('course_id', $course->id)->first();
        if ($opinion) {
            $opinion->status = $opinion->getStatus();
        }

        // Данные для страницы
        $data = [
            'course' => $course,
            'lesson' => $lesson,
            'nextLesson' => $lesson->next(),
            'test' => $test,
            'answer' => $answer,
            'testContents' => $test ? Constructor::normalizeData($test->content, [
                'pollAnswers' => isset($answer->answer) ? $answer->answer : []
            ]) : null,
            'lessons' => $lessons,
            'lessonUser' => $lessonUser,
            'progressMap' => json_encode($progressMap),
            'opinion' => $opinion,
            'noHomeworkNumbers' => $noHomeworkNumbers,
        ];

        return view('course.show', $data);
    }

    public function setPassed(Request $request)
    {
        $lessonUser = LessonUser::with('lesson')->where([
            'user_id' => $request->user()->id,
            'lesson_id' => $request->lesson_id
        ])->first();

        if ($lessonUser) {
            $lessonUser->passed_at = date('Y-m-d H:i:s');
            $lessonUser->save();

            CourseHelper::updateLessonsEndCount($lessonUser->lesson);

            LessonAnalyticHelper::setPassed($request->lesson_id, $request->user()->id);

            CourseHelper::checkCertificate(
                $lessonUser->lesson->course_id,
                $request->user()->id
            );

            $lessons = Lesson::with([
                'user' => function ($query) {
                    $query->where('user_id', request()->user()->id);
                }
            ])
                ->orderBy('number')
                ->where('course_id', $lessonUser->lesson->course_id)
                ->get();

            return [
                'success' => true,
                'lessonPassed' => $lessonUser->passed_at,
                'progressMap' => ProgressMap::get($lessons),
            ];
        }

        return [
            'success' => false
        ];
    }
}
