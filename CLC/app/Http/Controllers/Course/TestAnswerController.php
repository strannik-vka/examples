<?php

namespace App\Http\Controllers\Course;

use App\Classes\Files;
use App\Classes\ProgressMap;
use App\Helpers\CourseHelper;
use App\Helpers\LessonAnalyticHelper;
use App\Helpers\LessonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\TestAnswerRequest;
use App\Models\Certificate;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\TestAnswer;
use Illuminate\Support\Facades\Http;

class TestAnswerController extends Controller
{
    public function store(TestAnswerRequest $request)
    {
        $isCreate = false;

        $TestAnswer = TestAnswer::with('test.lesson.course')->where([
            ['user_id', $request->user()->id],
            ['test_id', $request->test_id],
        ])->first();

        $request['user_id'] = $request->user()->id;

        if ($TestAnswer) {
            $TestAnswer->update($request->all());
        } else {
            $isCreate = true;

            $TestAnswer = TestAnswer::create($request->all());

            if (isset($TestAnswer->test->lesson) && $TestAnswer->test->lesson) {
                LessonAnalyticHelper::addAnswersCount($TestAnswer->test->lesson);
            }
        }

        $TestAnswer->correct_answers_count = $TestAnswer->userPoints();
        $TestAnswer->save();

        if ($request->hasFile('file')) {
            $file = Files::upload($request, 'file', 'test_answers_file');

            if ($file) {
                Files::delete($TestAnswer->file);
                $TestAnswer->file = $file;
                $TestAnswer->save();
            }
        }

        $isPassed = $TestAnswer->isPassed();

        $isCertificateUpdate = false;

        if (isset($TestAnswer->test->lesson) && $TestAnswer->test->lesson) {
            // Урокам модуля поставить статус пройдено
            if ($isPassed) {
                $lessons = Lesson::with([
                    'test',
                    'test.answer' => function ($query) {
                        $query->where('user_id', request()->user()->id);
                    },
                    'user' => function ($query) {
                        $query->where('user_id', request()->user()->id);
                    }
                ])->orderBy('number', 'asc')->where('course_id', $TestAnswer->test->lesson->course_id)->get();

                foreach ($lessons as $lesson) {
                    if ($lesson->isPassed() == false) {
                        if ($lesson->user) {
                            $lesson->user->passed_at = date('Y-m-d H:i:s');
                            $lesson->user->save();
                        } else {
                            $lesson->setUser(['passed' => true]);
                        }
                    }

                    if ($lesson->id == $TestAnswer->test->lesson->id) {
                        break;
                    }
                }

                $progressMap = ProgressMap::get($lessons);
            }

            // Проверка, можно ли создать/обновлять сертификат
            $isCertificateUpdate = CourseHelper::checkCertificate(
                $TestAnswer->test->lesson->course_id,
                $request->user()->id
            );
        }

        $test = Test::with('lesson')->find($request->test_id);

        if ($isCreate) {
            $text = [];
            $typeText = [];
            $typeContent = [];

            if ($request->hasFile('file')) {
                $typeText[] = 'Файл';
                $typeContent[] = '<a href="' . (config('app.url') . $file) . '">Открыть файл</a>';
            }

            if ($request->text) {
                $typeText[] = 'Текстовое поле';
                $typeContent[] = $request->text;
            }

            $text[] = 'Номер урока: ' . $test->lesson->number;
            $text[] = request()->user()->name;
            $text[] = implode(' и ', $typeText);
            $text[] = implode("\n", $typeContent);
            $text[] = date('Y-m-d в H:i');
            $text[] = request()->user()->email;

            // Отправка в тг
            Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
                'chat_id' => -1001907721687,
                'disable_web_page_preview' => true,
                'parse_mode' => 'HTML',
                'text' => implode("\n", $text)
            ]);
        }

        return [
            'success' => true,
            'data' => [
                'nextLessonUrl' => isset($test->lesson) ? LessonHelper::nextLessonUrl($test->lesson) : '',
                'progressMap' => isset($progressMap) ? $progressMap : [],
                'maxPoints' => $TestAnswer->maxPoints(),
                'userPoints' => $TestAnswer->correct_answers_count,
                'isCertificateUpdate' => $isCertificateUpdate,
                'certificate' => $isCertificateUpdate ? (
                    Certificate::where([
                        'course_id' => $TestAnswer->test->lesson->course_id,
                        'user_id' => $request->user()->id,
                    ])->first()
                ) : null
            ]
        ];
    }
}
