<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Constructor;
use App\Classes\EditorItems;
use App\Classes\Files;
use App\Classes\Filter;
use App\Helpers\AdminFileDelete;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        AdminFileDelete::heandle(new Post());

        EditorItems::setEditing(new Post());

        $items = Post::with('category', 'editorUser:id,name')->orderBy('created_at', 'desc');

        $items = Filter::apply([
            'id', 'category_id', 'name', 'image', 'published', 'created_at'
        ], $request, $items);

        if ($request->has('items') && $request->items) {
            $items->whereIn('id', (is_array($request->items)
                ? $request->items
                : explode(',', $request->items)
            ));
        }

        EditorItems::checkEditingItems(new Post(), $items->limit(50)->get());

        return [
            'paginate' => $items->paginate(20),
            'category' => Category::all(),
        ];
    }

    public function preview(Request $request)
    {
        $data = $request->all();

        if ($request->category_id) {
            $category = Category::find($request->category_id);
            if ($category) {
                $data['category'] = $category;
            }
        }

        $data['user'] = $request->user();
        $data['time'] = Carbon::parse($request->cteated_at)->format('H:i');
        $data['date'] = Carbon::parse($request->cteated_at)->format('d.m.Y');

        $data['content'] = '';
        if ($request->content) {
            $Constructor = new Constructor('content');
            $Constructor->oldData = $Constructor->fields;
            $contents = $Constructor->normalize();
            $data['content'] = view('post.show-content', [
                'contents' => $contents,
                'preview' => true
            ])->render();
        }

        return $data;
    }

    public function before($request)
    {
        if ($request->has('created_at')) {
            $request['created_at'] = Carbon::parse($request->created_at)->format('Y-m-d H:i:s');
        }

        return $request;
    }

    public function after($post, $request)
    {
        if ($request->has('image')) {
            Files::$convert_to_webp = false;
            $image = Files::upload($request, 'image', 'post', Post::$thumbs, 0);

            if ($image) {
                Files::delete($post->image, Post::$thumbs);
                $post->image = $image;
                $post->save();
            }
        }

        if ($request->has('content')) {
            $Constructor = new Constructor('content', $post->content);
            $Constructor->filesUpload([
                'path' => 'post_content',
                'thumbs' => [[640]]
            ]);
            $post->content = $Constructor->fields;
            $post->save();
        }
    }

    public function store(Request $request)
    {
        $request = $this->before($request);

        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'image' => 'image|mimes:jpg,png,jpeg,webp|max:20048',
            'published' => 'numeric'
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $request['user_id'] = $request->user()->id;

        $post = Post::create($request->all());

        $this->after($post, $request);

        return ['success' => $this->edit($post->id)];
    }

    public function edit($id)
    {
        return Post::with('category', 'editorUser:id,name')->find($id);
    }

    public function update(Request $request, Post $post)
    {
        $request = $this->before($request);

        $validator_arr = [];

        foreach ([
            'name' => 'max:255',
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

        if (!$post->user_id) {
            $request['user_id'] = $request->user()->id;
        }

        $post->update($request->all());

        $this->after($post, $request);

        return ['success' => $this->edit($post->id)];
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post) {
            $Constructor = new Constructor('content', $post->content);
            $Constructor->removeTrashFiles([
                'thumbs' => Post::$thumbs
            ]);

            Files::delete($post->image, Post::$thumbs);
            Post::destroy($post->id);
        }

        return ['success' => true];
    }
}
