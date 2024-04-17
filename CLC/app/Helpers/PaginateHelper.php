<?php

namespace App\Helpers;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Container\Container;

class PaginateHelper
{
    public static function setResource($paginate, $resource, $options = [])
    {
        $items = $resource::collection($paginate->items());

        if (isset($options['keyBy'])) {
            $items = $items->keyBy($options['keyBy']);
        }

        $currentPage = Paginator::resolveCurrentPage('page');
        $total = $paginate->total();
        $perPage = $paginate->perPage();
        $nextPageUrl = $paginate->nextPageUrl();
        $previousPageUrl = $paginate->previousPageUrl();

        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items',
            'total',
            'perPage',
            'currentPage',
            'nextPageUrl',
            'previousPageUrl'
        ));
    }
}
