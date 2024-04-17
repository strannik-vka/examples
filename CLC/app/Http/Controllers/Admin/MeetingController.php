<?php

namespace App\Http\Controllers\Admin;

use App\Classes\EditorItems;
use App\Classes\Files;
use App\Classes\Filter;
use App\Helpers\AdminFileDelete;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        AdminFileDelete::heandle(new Meeting());

        EditorItems::setEditing(new Meeting());

        $items = Meeting::with('category', 'editorUser:id,name')->orderBy('created_at', 'desc');

        $items = Filter::apply([
            'id', 'category_id', 'name', 'description', 'videoSrc', 'image', 'published', 'created_at'
        ], $request, $items);

        if ($request->has('items') && $request->items) {
            $items->whereIn('id', (is_array($request->items)
                ? $request->items
                : explode(',', $request->items)
            ));
        }

        EditorItems::checkEditingItems(new Meeting(), $items->limit(50)->get());

        return [
            'paginate' => $items->paginate(20),
            'category' => Category::all(),
        ];
    }

    public function before($request)
    {
        if ($request->has('created_at')) {
            $request['created_at'] = Carbon::parse($request->created_at)->format('Y-m-d H:i:s');
        }

        return $request;
    }

    public function after($meeting, $request)
    {
        if ($request->has('image')) {
            Files::$convert_to_webp = false;
            $image = Files::upload($request, 'image', 'meeting', Meeting::$thumbs, 0);

            if ($image) {
                Files::delete($meeting->image, Meeting::$thumbs);
                $meeting->image = $image;
                $meeting->save();
            }
        }
    }

    public function store(Request $request)
    {
        $request = $this->before($request);

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'string|required',
            'videoSrc' => 'string|max:255|required',
            'image' => 'image|mimes:jpg,png,jpeg,webp|max:20048',
            'published' => 'numeric'
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $request['user_id'] = $request->user()->id;

        $meeting = Meeting::create($request->all());

        $this->after($meeting, $request);

        return ['success' => $this->edit($meeting->id)];
    }

    public function edit($id)
    {
        return Meeting::with('category', 'editorUser:id,name')->find($id);
    }

    public function update(Request $request, Meeting $meeting)
    {
        $request = $this->before($request);

        $validator_arr = [];

        foreach ([
            'name' => 'string|max:255',
            'description' => 'string|required',
            'videoSrc' => 'string|max:255|required',
            'image' => 'image|mimes:jpg,png,jpeg,webp|max:20048',
            'published' => 'numeric'
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        if (!$meeting->user_id) {
            $request['user_id'] = $request->user()->id;
        }

        $meeting->update($request->all());

        $this->after($meeting, $request);

        return ['success' => $this->edit($meeting->id)];
    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);

        if ($meeting) {
            Files::delete($meeting->image, Meeting::$thumbs);
            Meeting::destroy($meeting->id);
        }

        return ['success' => true];
    }
}
