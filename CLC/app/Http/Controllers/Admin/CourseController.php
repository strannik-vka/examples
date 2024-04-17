<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $items = Course::withCount('lessons')->latest();

        $items = Filter::apply([
            'id', 'name', 'lessons_count', 'description', 'lessons_start_count', 'lessons_end_count',
        ], $request, $items);

        return [
            'paginate' => $items->paginate(50)
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Course = Course::create($request->all());

        return ['success' => $this->edit($Course->id)];
    }

    public function edit($id)
    {
        return Course::withCount('lessons')->find($id);
    }

    public function update(Request $request, Course $Course)
    {
        $validator_arr = [];

        foreach ([
            'name' => 'required',
            'description' => 'nullable',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Course->update($request->all());

        return ['success' => $this->edit($Course->id)];
    }

    public function destroy($id)
    {
        Course::destroy($id);

        return ['success' => true];
    }
}
