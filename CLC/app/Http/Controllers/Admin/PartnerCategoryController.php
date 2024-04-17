<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerCategoryController extends Controller
{
    public function index(Request $request)
    {
        $items = PartnerCategory::latest();

        $items = Filter::apply([
            'name', 'sort', 'published'
        ], $request, $items);

        return [
            'paginate' => $items->paginate(50)
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sort' => 'required|numeric',
            'published' => 'numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $category = PartnerCategory::create($request->all());

        return ['success' => $this->edit($category->id)];
    }

    public function edit($id)
    {
        return PartnerCategory::find($id);
    }

    public function update(Request $request, $id)
    {
        $validator_arr = [];

        foreach ([
            'name' => 'required|string|max:255',
            'sort' => 'required|numeric',
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

        $category = PartnerCategory::find($id);

        $category->update($request->all());

        return ['success' => $this->edit($category->id)];
    }

    public function destroy($id)
    {
        PartnerCategory::destroy($id);

        return ['success' => true];
    }
}
