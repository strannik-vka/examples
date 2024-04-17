<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Constructor;
use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\Opinion;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpinionController extends Controller
{
    public function index(Request $request)
    {
        $items = Opinion::latest();

        $items = Filter::apply([
            'id', 'course_id',
        ], $request, $items);

        return [
            'paginate' => $items->paginate(50),
            'course' => Course::all()
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Opinion = Opinion::create($request->all());

        $this->after($Opinion, $request);

        return ['success' => $this->edit($Opinion->id)];
    }

    public function edit($id)
    {
        return Opinion::find($id);
    }

    public function update(Request $request, Opinion $Opinion)
    {
        $validator_arr = [];

        foreach ([
            'course_id' => 'required|exists:courses,id',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Opinion->update($request->all());

        $this->after($Opinion, $request);

        return ['success' => $this->edit($Opinion->id)];
    }

    public function after($Opinion, $request)
    {
        if ($request->has('answer_fields')) {
            $Constructor = new Constructor('answer_fields', $Opinion->answer_fields);
            $Opinion->answer_fields = $Constructor->fields;
            $Opinion->save();
        }

        if ($request->has('user_fields')) {
            $Constructor = new Constructor('user_fields', $Opinion->user_fields);
            $Opinion->user_fields = $Constructor->fields;
            $Opinion->save();
        }
    }

    public function destroy($id)
    {
        $Opinion = Opinion::find($id);

        Opinion::destroy($id);

        return ['success' => true];
    }
}
