<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Exports\OpinionAnswerExport;
use App\Helpers\PaginateHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OpinionAnswerResource;
use App\Models\OpinionAnswer;
use App\Models\Opinion;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OpinionAnswerController extends Controller
{
    public function index(Request $request)
    {
        $items = OpinionAnswer::with('user', 'opinion')->latest();

        $items = Filter::apply([
            'id', 'user_id', 'opinion_id', 'updated_at'
        ], $request, $items);

        if ($request->has('excel')) {
            return Excel::download(new OpinionAnswerExport($items->get()), 'OpinionAnswers.xlsx');
        }

        return [
            'paginate' => PaginateHelper::setResource($items->paginate(50), OpinionAnswerResource::class),
            'opinion' => Opinion::all(),
            'user' => User::limit(10)->get(),
        ];
    }
}
