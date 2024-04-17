<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\EvaluationPeriod;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index(Request $request)
    {
        $period = EvaluationPeriod::orderBy('id', 'desc')->first();

        if (!$period) {
            return [
                'error' => 'Нет периода'
            ];
        }

        $items = Evaluation::with('user')
            ->where('period_id', $period->id)
            ->groupBy('user_id')
            ->latest();

        if ($request->has('user_name') && $request->user_name) {
            $items->whereHas('user', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->user_name . '%');
            });
        }

        if ($request->has('user_email') && $request->user_email) {
            $items->whereHas('user', function ($query) use ($request) {
                return $query->where('email', 'like', '%' . $request->user_email . '%');
            });
        }

        if ($request->has('user_last_online_at') && $request->user_last_online_at) {
            $items->whereHas('user', function ($query) use ($request) {
                return $query->where('last_online_at', 'like', '%' . $request->user_last_online_at . '%');
            });
        }

        $stat = [];
        $evals = Evaluation::where('period_id', $period->id)->get();
        foreach ($evals as $eval) {
            if (!isset($stat[$eval->user_id])) {
                $stat[$eval->user_id] = [
                    'count' => 0,
                    'completed' => 0,
                ];
            }

            $stat[$eval->user_id]['count']++;

            if ($eval->completed) {
                $stat[$eval->user_id]['completed']++;
            }
        }

        $paginate = $items->paginate(500);

        $paginate->getCollection()->transform(function ($value) use ($stat) {
            $value->stat = $stat[$value->user_id]['completed'] . ' из ' . $stat[$value->user_id]['count'];
            return $value;
        });

        return [
            'paginate' => $paginate
        ];
    }
}
