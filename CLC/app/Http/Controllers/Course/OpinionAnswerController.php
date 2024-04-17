<?php

namespace App\Http\Controllers\Course;

use App\Classes\Constructor;
use App\Helpers\CourseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\OpinionAnswerRequest;
use App\Models\Certificate;
use App\Models\Opinion;
use App\Models\OpinionAnswer;
use Illuminate\Support\Facades\Http;

class OpinionAnswerController extends Controller
{
    public function store(OpinionAnswerRequest $request)
    {
        $opinion = Opinion::with('course')->where('course_id', $request->course_id)->first();

        if (!$opinion) {
            return ['error' => 'Для данного курса нет возможности оставить мнение'];
        }

        $isOpinionAnswer = OpinionAnswer::where([
            'opinion_id' => $opinion->id,
            'user_id' => $request->user()->id,
        ])->count();

        if ($isOpinionAnswer) {
            return ['error' => 'Для данного курса вы уже оставили мнение'];
        }

        $OpinionAnswer = OpinionAnswer::create([
            'answer_data' => $request->answer_data,
            'user_data' => $request->user_data,
            'opinion_id' => $opinion->id,
            'user_id' => $request->user()->id,
        ]);

        $this->_sendToTg($opinion, $OpinionAnswer);

        CourseHelper::sendCertificateMail($request->user()->id, $opinion->course_id);

        return [
            'success' => true,
            'data' => [
                'certificate' => Certificate::where([
                    'user_id' => $request->user()->id,
                    'course_id' => $opinion->course_id
                ])->first()
            ]
        ];
    }

    public function _sendToTg($opinion, $OpinionAnswer)
    {
        $text = [];

        $text[] = 'Новое мнение';
        $text[] = 'Курс: ' . $opinion->course->name;
        $text[] = '<b>Ответы:</b>';

        $answerFields = Constructor::normalizeData($opinion->answer_fields, [
            'pollAnswers' => $OpinionAnswer->answer_data
        ]);

        if ($answerFields) {
            foreach ($answerFields as $answerField) {
                $value = [];

                if ($answerField->value['variants']) {
                    foreach ($answerField->value['variants'] as $variant) {
                        if (isset($variant['checked']) && $variant['checked']) {
                            $value[] = $variant['text'];
                        }
                    }

                    $value = implode(', ', $value);
                } else if ($answerField->value['isUserVariant']) {
                    $value = $answerField->value['value'];
                }

                $text[] = $answerField->value['question'] . ': ' . $value;
            }
        }

        $text[] = '<b>О себе:</b>';

        $userFields = Constructor::normalizeData($opinion->user_fields, [
            'pollAnswers' => $OpinionAnswer->user_data
        ]);

        if ($userFields) {
            foreach ($userFields as $userField) {
                $value = [];

                if ($userField->value['variants']) {
                    foreach ($userField->value['variants'] as $variant) {
                        if (isset($variant['checked']) && $variant['checked']) {
                            $value[] = $variant['text'];
                        }
                    }

                    $value = implode(', ', $value);
                } else if ($userField->value['isUserVariant']) {
                    if (is_string($userField->value['value'])) {
                        $value = $userField->value['value'];
                    } else {
                        $value = null;
                    }
                }

                if ($value) {
                    $text[] = $userField->value['question'] . ': ' . $value;
                }
            }
        }

        Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
            'chat_id' => -1001920072961,
            'disable_web_page_preview' => true,
            'parse_mode' => 'HTML',
            'text' => implode("\n", $text)
        ]);
    }
}
