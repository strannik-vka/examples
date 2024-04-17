<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class TinkoffKassaHelper
{
    // Тестовый терминал
    // public static $TerminalKey = '';
    // public static $Password = '';

    // Боевой терминал
    public static $TerminalKey = '';
    public static $Password = '';

    public static function createToken($params)
    {
        foreach (['Shops', 'Receipt', 'Data'] as $ignore_key) {
            if (isset($params[$ignore_key])) {
                unset($params[$ignore_key]);
            }
        }

        $params['Password'] = self::$Password;

        ksort($params);

        $token = '';

        foreach ($params as $param_value) {
            if (is_scalar($param_value)) {
                $token .= $param_value;
            }
        }

        return hash('sha256', $token);
    }

    public static function createPayment($options)
    {
        $options->amount = number_format($options->amount, 2, '.', '');

        try {
            $params = [
                'TerminalKey' => self::$TerminalKey,
                'Amount' => $options->amount * 100,
                'OrderId' => $options->payment_id,
                'SuccessURL' => $options->return_url,
                'PayType' => 'O',
                'Receipt' => [
                    'Email' => $options->email,
                    'Taxation' => 'usn_income',
                    'Items' => [
                        [
                            'Name' => 'Оплата платежа',
                            'Price' => $options->amount * 100,
                            'Quantity' => 1,
                            'Amount' => $options->amount * 100,
                            'Tax' => 'none'
                        ]
                    ]
                ],
            ];

            $params['Token'] = self::createToken($params);

            $response = Http::post('https://securepay.tinkoff.ru/v2/Init', $params);

            $object = $response->object();

            return (object)[
                'success' => $object->Success,
                'response' => $object
            ];
        } catch (\Exception $e) {
            return (object)[
                'success' => false,
                'response' => $e->getMessage(),
            ];
        }
    }

    public static function getPaymentInfo($paymentId)
    {
        try {
            $params = [
                'TerminalKey' => self::$TerminalKey,
                'PaymentId' => $paymentId
            ];

            $params['Token'] = self::createToken($params);

            $response = Http::post('https://securepay.tinkoff.ru/v2/GetState', $params);

            $object = $response->object();

            return (object)[
                'success' => $object->Success,
                'response' => $object
            ];
        } catch (\Exception $e) {
            return (object)[
                'success' => false,
                'response' => $e->getMessage()
            ];
        }
    }
}
