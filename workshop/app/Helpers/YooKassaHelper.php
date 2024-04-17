<?php

namespace App\Helpers;

class YooKassaHelper
{
    public static $shopId = '';
    public static $secretKey = '';

    public static function createPayment($options)
    {
        $client = new \YooKassa\Client();
        $client->setAuth(self::$shopId, self::$secretKey);

        $options->amount = number_format($options->amount, 2, '.', '');

        try {
            $response = $client->createPayment(
                [
                    'amount' => [
                        'value' => $options->amount,
                        'currency' => 'RUB',
                    ],
                    'confirmation' => [
                        'type' => 'redirect',
                        'locale' => 'ru_RU',
                        'return_url' => $options->return_url,
                    ],
                    'capture' => true,
                    'metadata' => [
                        'order_id' => $options->payment_id,
                    ],
                    'receipt' => [
                        'customer' => [
                            'full_name' => $options->name,
                            'email' => $options->email,
                        ]
                    ]
                ],
                uniqid('', true)
            );

            return (object)[
                'success' => true,
                'response' => $response
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
        $client = new \YooKassa\Client();
        $client->setAuth(self::$shopId, self::$secretKey);

        try {
            $response = $client->getPaymentInfo($paymentId);

            return (object)[
                'success' => true,
                'response' => $response
            ];
        } catch (\Exception $e) {
            return (object)[
                'success' => false,
                'response' => $e
            ];
        }
    }
}
