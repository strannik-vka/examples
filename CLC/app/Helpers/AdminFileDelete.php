<?php

namespace App\Helpers;

use App\Classes\Files;

class AdminFileDelete
{
    public static function heandle($model)
    {
        if (request('action') == 'fileDelete') {
            $model = $model::find(request('id'));

            if ($model) {
                $files = $model[request('name')];

                if (is_array($files)) {
                    Files::delete(request('url'));
                    $model[request('name')] = array_filter($files, function ($url) {
                        return $url != request('url');
                    });
                    $model->save();
                } else {
                    Files::delete($files);
                    $model[request('name')] = null;
                    $model->save();
                }
            }

            die(json_encode([
                'success' => true
            ]));
        }
    }
}
