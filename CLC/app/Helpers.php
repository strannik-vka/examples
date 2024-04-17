<?php

use App\Classes\Files;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Container\Container;

function getHtmlArray($array)
{
    $result = [];

    $array_keys = array_keys($array);

    foreach ($array_keys as $item) {
        if (is_array($array[$item])) {
            foreach ($array[$item] as $key => $value) {
                if ($value instanceof SplFileInfo && $value->getPath() !== '') {
                    continue;
                }

                if ($value) {
                    $result[$key][$item] = $value;
                }
            }
        } else {
            if (!($array[$item] instanceof SplFileInfo && $array[$item]->getPath() !== '') && $array[$item]) {
                $result[$item] = $array[$item];
            }
        }
    }

    return $result ? $result : null;
}

function cursorPaginateCollection($items, $collection, $count = 50)
{
    $total = $items->count();
    $paginate = $items->cursorPaginate($count);

    $collection = str_replace('/', '', '\App\Http\Resources\/' . $collection);

    return [
        'data' => $collection::collection($paginate->items()),
        'next_page_url' => $paginate->nextPageUrl(),
        'per_page' => $paginate->perPage(),
        'prev_page_url' => $paginate->previousPageUrl(),
        'total' => $total
    ];
}

function PaginateCollection($paginate, $collection, $options = [])
{
    $collection = str_replace('/', '', '\App\Http\Resources\/' . $collection);
    $items = $collection::collection($paginate->items());

    if (isset($options['keyBy'])) {
        $items = $items->keyBy($options['keyBy']);
    }

    $currentPage = Paginator::resolveCurrentPage('page');
    $total = $paginate->total();
    $perPage = $paginate->perPage();

    return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
        'items',
        'total',
        'perPage',
        'currentPage'
    ));
}

function ThumbName($thumb)
{
    return $thumb[0] . 'x' . (isset($thumb[1]) ? $thumb[1] : $thumb[0]);
}

function ImageUrl($url, $thumb = false, $app_url = false, $default = null)
{
    if (is_array($url)) {
        $url = $url[0];
    }

    if ($thumb && $url) {
        $name = explode('/', $url);
        $name = end($name);
    }

    $result = $url
        ? ($thumb
            ? ($app_url ? config('app.url') : '') . str_replace($name, $thumb . '_' . $name, $url)
            : ($app_url ? config('app.url') : '') . $url)
        : null;

    return $result ? $result : $default;
}

function originalName($str, $default = false)
{
    $originalName = Files::originalName($str);

    return $originalName ? $originalName : $default;
}

function NumberWord($value, $words, $show = false)
{
    $num = $value % 100;

    if ($num > 19) {
        $num = $num % 10;
    }

    $out = $show ? $value . ' ' : '';

    switch ($num) {
        case 1:
            $out .= $words[0];
            break;
        case 2:
        case 3:
        case 4:
            $out .= $words[1];
            break;
        default:
            $out .= $words[2];
            break;
    }

    return $out;
}

function toJson($data, $fields, $toJson = true)
{
    $result = [];

    foreach ($fields as $key => $field) {
        if (is_array($field)) {
            $result[$key] = toJson($data[$key], $field, false);
        } else {
            $result[$field] = isset($data[$field]) ? $data[$field] : '';
        }
    }

    return $toJson ? collect($result)->toJson() : $result;
}

function datetimeTextFormat($datetime)
{
    $now = Carbon::now();

    $diffInMinutes = $now->diffInMinutes($datetime);

    if ($diffInMinutes < 2) {
        return 'Только что';
    }

    if ($diffInMinutes < 60) {
        return NumberWord($diffInMinutes, ['минуту', 'минуты', 'минут'], true) . ' назад';
    }

    $diffInHours = $datetime->diffInHours($now);

    if ($diffInHours < 24) {
        return NumberWord($diffInHours, ['час', 'часа', 'часов'], true) . ' назад';
    }

    $diffInDays = $datetime->diffInDays($now);

    if ($diffInDays < 4) {
        return NumberWord($diffInDays, ['день', 'дня', 'дней'], true) . ' назад';
    }

    return $datetime->format('d.m.Y');
}

function getSocialInfo($url)
{
    $short = null;
    $name = null;

    if (strpos($url, 'facebook') !== false) {
        $short = 'fb';
        $name = 'facebook';
    } else if (strpos($url, 'vk') !== false) {
        $short = 'vk';
        $name = 'vk';
    } else if (strpos($url, 'twitter') !== false) {
        $short = 'tw';
        $name = 'twitter';
    }

    return (object) [
        'short' => $short,
        'name' => $name,
        'url' => $url
    ];
}

function getSocials($socials)
{
    $result = [];

    $socials = explode(',', $socials);

    foreach ($socials as $social) {
        $result[] = getSocialInfo(trim($social));
    }

    return $result;
}

function allowedTags($str, $tags = [])
{
    if ($tags === false) {
        $tags = [];
    } else {
        $tags = $tags ? $tags : ['a', 'b', 'strong', 'em', 'i', 'u', 'ul', 'li', 'p', 'br', 'iframe'];
    }

    $str = htmlentities($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = html_entity_decode($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    return strip_tags($html, $tags);
}
