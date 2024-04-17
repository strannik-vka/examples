<?php

namespace App\Http\Controllers;

use App\Helpers\LeadersCompetitionHelper;
use App\Mail\ApplicationEvaluated;
use App\Models\Evaluation;
use App\Models\EvaluationCriterion;
use App\Models\EvaluationPeriod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EvaluationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $period = EvaluationPeriod::latest()->first();

        $evaluation_completed_count = $period ? Evaluation::where([
            ['user_id', $user->id],
            ['period_id', $period->id],
            ['completed', 1]
        ])->count() : 0;

        $evaluation_count = $period ? Evaluation::where([
            ['user_id', $user->id],
            ['period_id', $period->id]
        ])->count() : 0;

        $isEvaluationCompleted = $evaluation_completed_count >= $evaluation_count;

        return view('evaluation.index', [
            'user' => $user,
            'period' => $period,
            'evaluation_completed_count' => $evaluation_completed_count,
            'evaluation_count' => $evaluation_count,
            'isEvaluationCompleted' => $isEvaluationCompleted,
            'evaluations' => $period ? Evaluation::where([
                ['user_id', $user->id],
                ['period_id', $period->id]
            ])->orderBy('completed', 'asc')->get() : null
        ]);
    }

    public function process(Request $request)
    {
        $user = $request->user();
        $period = EvaluationPeriod::latest()->first();

        if ($request->has('project_id') && $request->project_id) {
            $evaluation = Evaluation::with('project')->where([
                ['project_id', $request->project_id],
                ['user_id', $user->id],
                ['period_id', $period->id]
            ])->first();

            if (!$evaluation) {
                return redirect(Route('evaluation.process'));
            }
        } else {
            $evaluation = Evaluation::with('project')->where([
                ['user_id', $user->id],
                ['period_id', $period->id]
            ])->orderBy('completed', 'asc')->first();

            if ($evaluation) {
                if ($evaluation->completed) {
                    return redirect(Route('evaluation.index'));
                }
            }

            return $evaluation
                ? redirect(Route('evaluation.process') . '?project_id=' . $evaluation->project->id)
                : redirect(Route('evaluation.index'));
        }

        $url_previous = url()->previous();

        if ($url_previous) {
            if (strpos($url_previous, 'process') === false) {
                $request->session()->now('url_previous', $url_previous);
            } else {
                $url_previous = $url_previous = $request->session()->get('url_previous');
            }
        } else {
            $url_previous = $request->session()->get('url_previous');
        }

        if (!$url_previous) {
            $url_previous = Route('evaluation.index');
        }

        $project = $evaluation->project;

        return view('evaluation.process', [
            'url_previous' => $url_previous,
            'project' => $project,
            'evaluation' => $evaluation,
            'criterions' => EvaluationCriterion::where('period_id', $period->id)->get(),
            'activitySphereNames' => LeadersCompetitionHelper::modelActivitySpheres($project->activity_spheres, 'name')
        ]);
    }

    public function update(Request $request, $project_id)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'nullable|max:65535',
            'criterions' => 'required|array',
            'criterions.*' => 'required'
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = $request->user();
        $period = EvaluationPeriod::latest()->first();

        $evaluation = Evaluation::with('project.user')->where([
            ['project_id', $project_id],
            ['user_id', $user->id],
            ['period_id', $period->id]
        ])->first();

        if (!$evaluation) {
            return ['error' => 'Проект не найден, обновите страницу'];
        }

        if (!$period->isAccessEvaluation($user)) {
            return ['error' => 'Доступ к оценке запрещен!'];
        }

        if ($evaluation) {
            if ($evaluation->completed) {
                return ['error' => 'Доступ к оценке запрещен!'];
            }

            $criterions_ids = array_keys($request->criterions);
            $criterionsCount = EvaluationCriterion::whereIn('id', $criterions_ids)->count();

            if ($criterionsCount != count($criterions_ids)) {
                return ['error' => 'Список критерий не совпадает'];
            }

            $total = 0;

            foreach ($request->criterions as $val) {
                $val = explode('/', $val);
                $total += (int) $val[0];
            }

            $type = $evaluation->completed;

            $evaluation->criterions = $request->criterions;
            $evaluation->total = $total;
            $evaluation->comment = $request->comment;
            $evaluation->completed = 1;
            $evaluation->updated_at = date('Y-m-d H:i:s');
            $evaluation->save();

            // if (isset($evaluation->project->user) && $evaluation->project->user) {
            // try {
            //     Mail::to($evaluation->project->user)->send(
            //         new ApplicationEvaluated($evaluation->project->user)
            //     );
            // } catch (Exception $e) {
            //     Log::info('Не отправилось письмо участнику на: ' . $user->email . ', error: ' . $e->getMessage());
            // }
            // }

            return [
                'success' => true,
                'type' => $type ? 2 : 1
            ];
        } else {
            return ['error' => 'Проект не найден'];
        }
    }

    public function projects(Request $request)
    {
        $user = $request->user();
        $period = EvaluationPeriod::latest()->first();

        if ($request->ajax()) {
            $evaluations = Evaluation::with('project')->where([
                ['user_id', $user->id],
                ['period_id', $period->id]
            ]);

            // Сортировка
            $sort_validator = Validator::make($request->all(), [
                'sort_key' => 'required', Rule::in(['id', 'name', 'completed', 'total', 'comment']),
                'sort_val' => 'required', Rule::in(['asc', 'desc'])
            ]);

            if ($sort_validator->fails()) {
                $evaluations->orderBy('completed', 'asc');
            } else {
                if ($request->sort_key == 'name') {
                    $evaluations->whereHas('project', function ($query) use ($request) {
                        $query->orderBy('name', $request->sort_val);
                    });
                } else {
                    $evaluations->orderBy($request->sort_key, $request->sort_val);
                }
            }

            return PaginateCollection($evaluations->paginate(50), 'Evaluation\ProjectResource');
        }

        return view('evaluation.projects', [
            'isAccessEvaluation' => $period->isAccessEvaluation($user)
        ]);
    }
}
