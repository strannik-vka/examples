<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {
        foreach ($request->items as $items_id) {
            $ControllerName = 'App\/Http\/Controllers\/Admin\/' . Str::ucfirst($request->name) . 'Controller';
            $ControllerName = str_replace('/', '', $ControllerName);

            $ItemController = new $ControllerName();

            $ItemController->destroy($items_id);
        }

        return ['success' => true];
    }
}
