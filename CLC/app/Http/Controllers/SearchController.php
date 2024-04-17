<?php

namespace App\Http\Controllers;

use App\Helpers\SearchHelper;
use App\Http\Controllers\Controller;
use App\Models\BlockExpert;
use App\Models\BlockProfessional;
use App\Models\Post;

class SearchController extends Controller
{
    public function index()
    {
        if (!request('query')) {
            return ['error' => 'Введине запрос или выберите категорию'];
        }

        $categories = SearchHelper::categories();

        $data = collect();

        if (in_array('news', $categories)) {
            $news = Post::where('name', 'like', '%' . request('query') . '%')->orWhere('content', 'like', '%' . request('query') . '%')->limit(3)->get();

            foreach ($news as $post) {
                $data->push([
                    'url' => route('post.show', $post->id),
                    'name' => strip_tags($post->name),
                    'category' => 'Новость',
                ]);
            }
        }

        if (in_array('experts', $categories)) {
            $experts = BlockExpert::where('name', 'like', '%' . request('query') . '%')->where('published', 1)->limit(3)->get();

            foreach ($experts as $expert) {
                $data->push([
                    'url' => '/?expert-show=' . $expert->id,
                    'name' => $expert->name,
                    'category' => 'Эксперт',
                ]);
            }
        }

        if (in_array('professionals', $categories)) {
            $professionals = BlockProfessional::where('name', 'like', '%' . request('query') . '%')->where('published', 1)->limit(3)->get();

            foreach ($professionals as $professional) {
                $data->push([
                    'url' => '/?professional-show=' . $professional->id,
                    'name' => $professional->name,
                    'category' => 'Профессионал',
                ]);
            }
        }

        if (in_array('about', $categories)) {
            // О проекте
            if (SearchHelper::pageSearch(route('about'), request('query'))) {
                $data->push([
                    'url' => route('about'),
                    'name' => 'О проекте',
                    'category' => 'Страница'
                ]);
            }
        }

        if (in_array('contest', $categories)) {
            // О конкурсе
            if (SearchHelper::pageSearch(route('leadership.contest'), request('query'))) {
                $data->push([
                    'url' => route('leadership.contest'),
                    'name' => 'О конкурсе',
                    'category' => 'Страница'
                ]);
            }
        }

        return [
            'data' => $data
        ];
    }
}
