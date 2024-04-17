<?php

namespace App\Helpers;

use App\Models\User;

class PaymentHelper
{
    public static function checkStatus($payment)
    {
        $paymentInfo = TinkoffKassaHelper::getPaymentInfo($payment->bank_payment_id);

        if ($paymentInfo->success) {
            $bankStatus = $paymentInfo->response->Status;

            if ($bankStatus == 'CONFIRMED') {
                $user = User::find($payment->user_id);

                if ($user) {
                    TelegramHelper::send([
                        'text' => $user->email . ': ' . "\n" . 'Оплата успешно прошла'
                    ]);
                }

                $payment->status_id = 2;
                $payment->save();
            }
        }

        return $payment;
    }
}
