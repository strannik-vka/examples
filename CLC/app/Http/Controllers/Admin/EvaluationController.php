<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Exports\EvaluationExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Evaluation;
use App\Models\EvaluationPeriod;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{
    public function index(Request $request)
    {
        $period = EvaluationPeriod::orderBy('id', 'desc')->first();

        $items = Evaluation::with('user', 'project')
            ->where('period_id', $period->id)->orderBy('user_id', 'desc');

        $items = Filter::apply([
            'total', 'comment', 'updated_at'
        ], $request, $items);

        if ($request->has('expert')) {
            $items->whereHas('user', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->expert . '%');
            });
        }

        if ($request->has('name')) {
            $items->whereHas('project', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->has('fio')) {
            $items->whereHas('project', function ($query) use ($request) {
                return $query->where('fio', 'like', '%' . $request->fio . '%');
            });
        }

        if ($request->has('excel')) {
            $items->where('total', '>', 0);
            return Excel::download(new EvaluationExport($items->get()), 'result.xlsx');
        }

        return [
            'paginate' => cursorPaginateCollection($items, 'Admin\EvaluationResource', 50)
        ];
    }
}
