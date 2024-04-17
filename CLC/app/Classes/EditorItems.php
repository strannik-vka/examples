<?php

namespace App\Classes;

use Carbon\Carbon;

class EditorItems
{
    public static function isEditing($item)
    {
        if ($item->editor_user_id) {
            if ($item->updated_at->addHour() > Carbon::now()) {
                return $item->editor_user_id != request()->user()->id;
            }
        }

        return false;
    }

    public static function checkEditingItems($Model, $items)
    {
        $updateIds = [];

        foreach ($items as $item) {
            if ($item->editor_user_id) {
                if ($item->updated_at->addHour() <= Carbon::now()) {
                    $updateIds[] = $item->id;
                }
            }
        }

        if ($updateIds) {
            $Model::whereIn('id', $updateIds)->update([
                'editor_user_id' => null
            ]);
        }
    }

    public static function setEditing($Model)
    {
        $item_id = request('editor_item_id');

        if ($item_id) {
            if ($item_id == 'delete') {
                $Model::where('editor_user_id', request()->user()->id)->update([
                    'editor_user_id' => null
                ]);
            } else {
                $item = $Model::find($item_id);

                if ($item) {
                    if (self::isEditing($item)) {
                        die(json_encode([
                            'error' => 'Уже редактируется другим пользователем'
                        ]));
                    } else {
                        $item->update([
                            'editor_user_id' => request()->user()->id,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);

                        die(json_encode([
                            'success' => true
                        ]));
                    }
                }

                die(json_encode([
                    'error' => 'Запись не найдена'
                ]));
            }
        }
    }
}
