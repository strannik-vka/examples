<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Exports\TestAnswerExport;
use App\Helpers\PaginateHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TestAnswerResource;
use App\Http\Resources\Admin\TestOptionsResource;
use App\Models\Notification;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\TestAnswer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class TestAnswerController extends Controller
{
    public function index(Request $request)
    {
        $items = TestAnswer::with('test.lesson', 'user')
            ->latest();

        $items = Filter::apply([
            'user_id', 'test_id', 'text', 'file', 'updated_at', 'comment'
        ], $request, $items);

        if ($request->has('user_email') && $request->user_email) {
            $items->whereHas('user', function ($query) use ($request) {
                return $query->where('email', 'like', '%' . $request->user_email . '%');
            });
        }

        if ($request->has('excel')) {
            return Excel::download(new TestAnswerExport($items->get()), 'TestAnswers.xlsx');
        }

        $paginate = $items->paginate(50);

        $paginate = PaginateHelper::setResource($paginate, TestAnswerResource::class);

        return [
            'paginate' => $paginate,
            'user' => User::limit(10)->latest()->get(),
            'test' => TestOptionsResource::collection(Test::with('lesson')->get()),
        ];
    }

    public function _filter($items, $request)
    {
        if ($request->has('test_name') && $request->test_name) {
            $items->whereHas('lesson', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->test_name . '%');
            });
        }

        return $items;
    }

    public function edit($id)
    {
        return TestAnswer::with('test.lesson', 'user')->find($id);
    }

    public function update(Request $request, $id)
    {
        $validator_arr = [];

        foreach ([
            'comment' => 'max:65535|string',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $TestAnswer = TestAnswer::find($id);

        if ($request->has('comment')) {
            if ($request->comment) {
                if ($request->comment != $TestAnswer->comment) {
                    Notification::create([
                        'is_read' => 0,
                        'user_id' => $TestAnswer->user_id,
                        'type_id' => 7,
                        'notificateable_id' => $TestAnswer->id,
                        'notificateable_type' => 'App\Models\TestAnswer',
                    ]);
                }
            }

            $TestAnswer->comment = $request->comment;
            $TestAnswer->save();
        }

        return ['success' => $this->edit($TestAnswer->id)];
    }
}
