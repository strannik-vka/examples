<?php

namespace App\Http\Controllers\Course;

use App\Classes\Constructor;
use App\Helpers\CourseHelper;
use App\Helpers\OpinionHelper;
use App\Http\Controllers\Controller;
use App\Models\Opinion;
use App\Models\OpinionAnswer;

class OpinionController extends Controller
{
    public function show($id)
    {
        $opinion = Opinion::with('course')->find($id);

        if (!$opinion) {
            abort(404);
        }

        $course = $opinion->course;

        $opinion->status = $opinion->getStatus();

        // Список уроков
        $lessons = CourseHelper::playlist($course->id);

        // Мнение юзера
        $OpinionAnswer = OpinionAnswer::where([
            'opinion_id' => $opinion->id,
            'user_id' => request()->user()->id,
        ])->first();

        return view('course.opinion', [
            'opinionIsActive' => true,
            'opinion' => $opinion,
            'answerFields' => Constructor::normalizeData($opinion->answer_fields, [
                'pollAnswers' => isset($OpinionAnswer->answer_data) ? $OpinionAnswer->answer_data : []
            ]),
            'userFields' => Constructor::normalizeData($opinion->user_fields, [
                'pollAnswers' => isset($OpinionAnswer->user_data) ? $OpinionAnswer->user_data : []
            ]),
            'course' => $course,
            'lessons' => $lessons,
            'lesson' => (object) ['id' => null, 'icon' => null],
            'OpinionAnswer' => $OpinionAnswer,
            'industries_chunks' => collect(OpinionHelper::$industries)->chunk(8)->all()
        ]);
    }
}
