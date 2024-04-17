<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\BlockExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlockExpertController extends Controller
{
    public function index(Request $request)
    {
        $items = BlockExpert::orderBy('created_at', 'desc');

        $items = Filter::apply([
            'id', 'name', 'photo', 'sort', 'published'
        ], $request, $items);

        return [
            'paginate' => $items->paginate(20),
        ];
    }

    public function after($BlockExpert, $request)
    {
        if ($request->has('photo')) {
            Files::$convert_to_webp = false;
            $photo = Files::upload($request, 'photo', 'block_expert', BlockExpert::$thumbs, 0);

            if ($photo) {
                Files::delete($BlockExpert->photo, BlockExpert::$thumbs);
                $BlockExpert->photo = $photo;
                $BlockExpert->save();
            }
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'image|mimes:jpg,png,jpeg|max:20048',
            'sort' => 'numeric',
            'published' => 'numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $BlockExpert = BlockExpert::create($request->all());

        $this->after($BlockExpert, $request);

        return ['success' => $this->edit($BlockExpert->id)];
    }

    public function edit($id)
    {
        return BlockExpert::find($id);
    }

    public function update(Request $request, BlockExpert $BlockExpert)
    {
        $validator_arr = [];

        foreach ([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'image|mimes:jpg,png,jpeg|max:20048',
            'sort' => 'numeric',
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

        $BlockExpert->update($request->all());

        $this->after($BlockExpert, $request);

        return ['success' => $this->edit($BlockExpert->id)];
    }

    public function destroy($id)
    {
        $BlockExpert = BlockExpert::find($id);

        if ($BlockExpert) {
            Files::delete($BlockExpert->photo, BlockExpert::$thumbs);
            BlockExpert::destroy($BlockExpert->id);
        }

        return ['success' => true];
    }
}
