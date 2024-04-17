<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Opinion;
use App\Models\OpinionAnswer;
use PDF;

class CertificateController extends Controller
{
    public function accessDownload($course_id)
    {
        $certificate = Certificate::with('course', 'user')->where([
            'course_id' => $course_id,
            'user_id' => request()->user()->id
        ])->first();

        if (!$certificate || !$certificate->course || !$certificate->user) {
            return [
                'error' => 'Сертификат не найден'
            ];
        }

        $opinion = Opinion::where('course_id', $certificate->course->id)->first();

        if ($opinion) {
            $opinionAnswer = OpinionAnswer::where([
                'opinion_id' => $opinion->id,
                'user_id' => request()->user()->id
            ])->count();

            if (!$opinionAnswer) {
                return [
                    'error' => 'Нужна рефлексия',
                    'opinionUrl' => route('course.opinion.show', $opinion->id)
                ];
            }
        }

        return [
            'success' => true,
            'certificate' => $certificate
        ];
    }

    public function show($id)
    {
        $accessDownload = $this->accessDownload($id);

        if (!request()->ajax()) {
            if (isset($accessDownload['opinionUrl'])) {
                return redirect($accessDownload['opinionUrl']);
            }
        }

        if (!isset($accessDownload['success'])) {
            abort(404);
        }

        $certificate = $accessDownload['certificate'];

        $pdf = PDF::loadView('course.certificate', [
            'user' => $certificate->user,
            'course' => $certificate->course,
            'certificate' => $certificate
        ], [], [
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0
        ]);

        return $pdf->stream('certificate.pdf');
    }
}
