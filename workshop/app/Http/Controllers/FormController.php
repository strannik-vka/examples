<?php

namespace App\Http\Controllers;

use App\Helpers\TelegramHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function fill(Request $request)
    {
        $text = [];

        $values = $request->all();

        foreach ($values as $key => $value) {
            if (in_array($key, ['token', '_token', 'payment_product_id'])) {
                continue;
            }

            $text[] = $key . ': ' . $value;
        }

        TelegramHelper::send([
            'text' => implode("\n", $text)
        ]);

        return [
            'success' => true,
        ];
    }
}
