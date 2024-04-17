<?php

namespace App\Helpers;

use App\Models\PaymentProduct;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class PriceFromUrlHelper
{
    public static function setPrice($product_id)
    {
        $PaymentProduct = PaymentProduct::find($product_id);

        if ($PaymentProduct) {
            Cookie::queue(Cookie::make('product_id', $product_id, 43200, '/'));
        }
    }

    public static function getPrice($product_id)
    {
        // Цена по ссылке
        $cookie_product_id = Cookie::get('product_id');

        if ($cookie_product_id) {
            try {
                $cookie_string = Crypt::decryptString($cookie_product_id);

                $cookie_string_arr = explode('|', $cookie_string);

                if (isset($cookie_string_arr[1])) {
                    $cookie_product_id = $cookie_string_arr[1];
                }
            } catch (\Exception $e) {
            }

            $PaymentProduct = PaymentProduct::find($cookie_product_id);

            if ($PaymentProduct) {
                return $PaymentProduct->amount;
            }
        }

        // Цена продукта
        $PaymentProduct = PaymentProduct::find($product_id);

        if ($PaymentProduct) {
            return $PaymentProduct->amount;
        }

        return 0;
    }
}
