<?php

namespace App\Http\Controllers;

use App\Helpers\RecommendationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function show(Request $request)
    {
        if ($request->name) {
            $name = str_replace(array("\r", "\n"), ' ', $request->name);
            $name = preg_replace('/[\s]{2,}/', ' ', $name);

            $data = RecommendationHelper::getItem($name);
        } else {
            $data = [];
        }

        return [
            'data' => $data
        ];
    }
}
