<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $items = Partner::with('category')->orderBy('sort', 'asc');

        $items = Filter::apply([
            'name', 'logo', 'sort', 'url', 'published', 'category_id'
        ], $request, $items);

        if ($request->has('items') && $request->items) {
            $items->whereIn('id', (is_array($request->items)
                ? $request->items
                : explode(',', $request->items)
            ));
        }

        return [
            'paginate' => $items->paginate(20),
            'category' => PartnerCategory::all()
        ];
    }

    public function after($partner, $request)
    {
        if ($request->has('logo')) {
            Files::$convert_to_webp = false;
            $logo = Files::upload($request, 'logo', 'partner', false, 0);

            if ($logo) {
                Files::delete($partner->logo);
                $partner->logo = $logo;
                $partner->save();
            }
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'logo' => 'image|mimes:jpg,jpeg,png,svg|max:20048',
            'sort' => 'required|numeric',
            'published' => 'numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $partner = Partner::create($request->all());

        $this->after($partner, $request);

        return ['success' => $this->edit($partner->id)];
    }

    public function edit($id)
    {
        return Partner::with('category')->find($id);
    }

    public function update(Request $request, Partner $partner)
    {
        $validator_arr = [];

        foreach ([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'logo' => 'image|mimes:jpg,jpeg,png,svg|max:20048',
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

        $partner->update($request->all());

        $this->after($partner, $request);

        return ['success' => $this->edit($partner->id)];
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);

        if ($partner) {
            Files::delete($partner->logo);
            Partner::destroy($partner->id);
        }

        return ['success' => true];
    }
}
