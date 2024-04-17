<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $items = Category::latest();

        $items = Filter::apply([
            'id', 'name', 'sort', 'published'
        ], $request, $items);

        return [
            'paginate' => $items->paginate(50)
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'published' => 'numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $category = Category::create($request->all());

        return ['success' => $this->edit($category->id)];
    }

    public function edit($id)
    {
        return Category::find($id);
    }

    public function update(Request $request, Category $category)
    {
        $validator_arr = [];

        foreach ([
            'name' => 'required',
            'published' => 'numeric',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $category->update($request->all());

        return ['success' => $this->edit($category->id)];
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return ['success' => true];
    }
}
