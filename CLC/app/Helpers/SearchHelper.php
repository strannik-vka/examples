<?php

namespace App\Helpers;

use DOMDocument;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SearchHelper
{
    public static function pageSearch($url, $query)
    {
        libxml_use_internal_errors(true);

        $response = Http::get($url);

        $dom = new DOMDocument();
        $dom->loadHTML($response->body());

        $main = $dom->getElementsByTagName('main');
        $main = isset($main[0]) ? $main[0]->textContent : null;

        if ($main) {
            return Str::contains($main, $query);
        }

        return null;
    }

    public static function categories()
    {
        if (is_array(request('categories'))) {
            return request('categories');
        }

        return ['about', 'contest', 'experts', 'professionals', 'news'];
    }
}
