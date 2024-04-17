<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Constructor;
use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $items = Test::latest();

        $items = Filter::apply([
            'id', 'lesson_id', 'name', 'description',
        ], $request, $items);

        return [
            'lesson' => Lesson::latest()->limit(50)->get(),
            'paginate' => $items->paginate(50)
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lesson_id' => 'required|exists:lessons,id',
            'name' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Test = Test::create($request->all());

        $this->after($Test, $request);

        return ['success' => $this->edit($Test->id)];
    }

    public function edit($id)
    {
        return Test::find($id);
    }

    public function update(Request $request, Test $Test)
    {
        $validator_arr = [];

        foreach ([
            'lesson_id' => 'required|exists:lessons,id',
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

        $Test->update($request->all());

        $this->after($Test, $request);

        return ['success' => $this->edit($Test->id)];
    }

    public function after($Test, $request)
    {
        if ($request->has('content')) {
            $Constructor = new Constructor('content', $Test->content);
            $Constructor->filesUpload([
                'path' => 'test_content',
                'thumbs' => [[640]]
            ]);
            $Test->content = $Constructor->fields;
            $Test->save();
        }
    }

    public function destroy($id)
    {
        $Test = Test::find($id);

        $Constructor = new Constructor('content', $Test->content);
        $Constructor->removeTrashFiles([
            'thumbs' => [[640]]
        ]);

        Test::destroy($id);

        return ['success' => true];
    }
}
