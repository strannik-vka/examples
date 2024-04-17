<?php

namespace App\Helpers;

use App\Models\Payment;

class PaymentHelper
{
    public static $statuses = [
        [
            'id' => 1,
            'name' => 'В процессе оплаты',
            'key' => 'pending'
        ],
        [
            'id' => 2,
            'name' => 'Оплата успешно прошла',
            'key' => 'succeeded'
        ],
        [
            'id' => 3,
            'name' => 'Оплата отменена',
            'key' => 'canceled'
        ],
        [
            'id' => 4,
            'name' => 'Оплата ждет подтверждения',
            'key' => 'waiting_for_capture'
        ]
    ];

    public static function findStatusKey($key)
    {
        $result = null;

        foreach (self::$statuses as $status) {
            if ($status['key'] == $key) {
                $result = (object) $status;
                break;
            }
        }

        return $result;
    }

    public static function find($id, $type, $user_id = null)
    {
        $user_id = $user_id ? $user_id : request()->user()->id;

        return Payment::where([
            ['paymentable_id', $id],
            ['paymentable_type', $type],
            ['user_id', $user_id],
        ])->orderBy('id', 'desc')->first();
    }

    public static function checkStatus($payment)
    {
        $paymentInfo = TinkoffKassaHelper::getPaymentInfo($payment->bank_payment_id);

        if ($paymentInfo->success) {
            $bankStatus = $paymentInfo->response->Status;

            if ($bankStatus == 'CONFIRMED') {
                $payment->status_id = 2;
                $payment->save();
            }
        }

        return $payment;
    }

    public static function userPaymentRequired($course, $user = null)
    {
        $user = $user ? $user : request()->user();

        if ($user->group_id === 2) {
            return false;
        }

        $CoursePrice = CoursePriceHelper::find($course->id);

        if ($CoursePrice) {
            $payment = self::find($course->id, 'App\Models\Course', $user->id);

            if ($payment) {
                if ($payment->status_id === 2) {
                    return false;
                } else {
                    $payment = self::checkStatus($payment);

                    if ($payment->status_id === 2) {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }
}
