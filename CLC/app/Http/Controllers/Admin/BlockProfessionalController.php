<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\BlockProfessional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlockProfessionalController extends Controller
{
    public function index(Request $request)
    {
        $items = BlockProfessional::orderBy('created_at', 'desc');

        $items = Filter::apply([
            'id', 'name', 'photo', 'sort', 'published'
        ], $request, $items);

        return [
            'paginate' => $items->paginate(20),
        ];
    }

    public function after($BlockProfessional, $request)
    {
        if ($request->has('photo')) {
            Files::$convert_to_webp = false;
            $photo = Files::upload($request, 'photo', 'block_professional', BlockProfessional::$thumbs, 0);

            if ($photo) {
                Files::delete($BlockProfessional->photo, BlockProfessional::$thumbs);
                $BlockProfessional->photo = $photo;
                $BlockProfessional->save();
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

        $BlockProfessional = BlockProfessional::create($request->all());

        $this->after($BlockProfessional, $request);

        return ['success' => $this->edit($BlockProfessional->id)];
    }

    public function edit($id)
    {
        return BlockProfessional::find($id);
    }

    public function update(Request $request, BlockProfessional $BlockProfessional)
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

        $BlockProfessional->update($request->all());

        $this->after($BlockProfessional, $request);

        return ['success' => $this->edit($BlockProfessional->id)];
    }

    public function destroy($id)
    {
        $BlockProfessional = BlockProfessional::find($id);

        if ($BlockProfessional) {
            Files::delete($BlockProfessional->photo, BlockProfessional::$thumbs);
            BlockProfessional::destroy($BlockProfessional->id);
        }

        return ['success' => true];
    }
}
