<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursePriceController extends Controller
{
    public function index(Request $request)
    {
        $items = CoursePrice::with('course')->latest();

        $items = Filter::apply([
            'id', 'course_id', 'amount'
        ], $request, $items);

        return [
            'paginate' => $items->paginate(50),
            'course' => Course::limit(10)->orderBy('id', 'desc')->get()
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer|exists:courses,id',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $CoursePrice = CoursePrice::create($request->all());

        return ['success' => $this->edit($CoursePrice->id)];
    }

    public function edit($id)
    {
        return CoursePrice::with('course')->find($id);
    }

    public function update(Request $request, CoursePrice $CoursePrice)
    {
        $validator_arr = [];

        foreach ([
            'course_id' => 'required|integer|exists:courses,id',
            'amount' => 'required|numeric',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $CoursePrice->update($request->all());

        return ['success' => $this->edit($CoursePrice->id)];
    }

    public function destroy($id)
    {
        CoursePrice::destroy($id);

        return ['success' => true];
    }
}
