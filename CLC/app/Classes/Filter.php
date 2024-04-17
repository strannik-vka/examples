<?php

namespace App\Classes;

class Filter
{
    public static function apply($fields, $Request, $items)
    {
        foreach ($fields as $item) {
            if (isset($Request[$item]) && $Request[$item] != '') {
                if (strpos($item, '_id') !== false) {
                    if ($Request[$item] == 'notnull') {
                        $items->whereNotNull($item);
                    } else {
                        if (is_array($Request[$item])) {
                            $items->whereIn($item, $Request[$item]);
                        } else {
                            $items->where($item, $Request[$item]);
                        }
                    }
                } else if ($Request[$item] == 'notnull') {
                    $items->whereNotNull($item);
                } else if ($Request[$item] == 'null') {
                    $items->whereNull($item);
                } else {
                    if (is_array($Request[$item])) {
                        if ($item == 'id') {
                            $items->whereIn('id', $Request[$item]);
                        } else {
                            $items->where(function ($query) use ($Request, $item) {
                                foreach ($Request[$item] as $value) {
                                    $query->orWhere($item, 'like', '%' . $value . '%');
                                }
                            });
                        }
                    } else {
                        if ($item == 'id') {
                            $items->where('id', $Request[$item]);
                        } else {
                            $items->where($item, 'like', '%' . $Request[$item] . '%');
                        }
                    }
                }
            }
        }

        return $items;
    }
}
