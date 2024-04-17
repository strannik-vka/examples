<?php

namespace App\Http\Controllers;

use App\Classes\Constructor;
use App\Classes\Filter;
use App\Helpers\PaginateHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return request()->ajax()
            ? $this->list()
            : view('post.index');
    }

    public function list()
    {
        $items = Post::with('category')->where('published', 1)->orderBy('created_at', 'desc');

        $request = request();

        $items = Filter::apply(['category_id'], $request, $items);

        $paginate = request('paginate') && request('paginate') < 30 ? request('paginate') : 9;

        $items = PaginateHelper::setResource($items->paginate($paginate), PostResource::class);

        return $items;
    }

    public function show($id)
    {
        $post = Post::with('user', 'category')->find($id);

        if (!$post) {
            abort(404);
        }

        $Constructor = new Constructor('content', $post->content);

        $relatedPosts = null;

        if ($post->category) {
            $relatedPosts = Post::with('category')->where([
                ['id', '!=', $post->id],
                ['category_id', $post->category->id]
            ])->latest()->limit(4);

            if ($relatedPosts->count() == 0) {
                $relatedPosts = null;
            }
        }

        if ($relatedPosts == null) {
            $relatedPosts = Post::with('category')->where('id', '!=', $post->id)->latest()->limit(4);
        }

        return view('post.show', [
            'post' => $post,
            'contents' => $Constructor->normalize(),
            'relatedPosts' => $relatedPosts->get()
        ]);
    }

    public function preview()
    {
        return view('post.show-preview');
    }

    public function addVoicePoll(Request $request, $id)
    {
        if ($request->id && isset($request->key)) {
            $post = Post::find($id);

            if (!$post) {
                return ['error' => 'Пост не найден'];
            }

            $Constructor = new Constructor('content', $post->content);

            $post->content = $Constructor->addVoicePoll($request->id, $request->key);
            $post->save();

            return [
                'contents' => $Constructor->normalize()
            ];
        }

        return null;
    }
}
