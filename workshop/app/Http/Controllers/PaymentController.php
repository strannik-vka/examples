<?php

namespace App\Http\Controllers;

use App\Helpers\PriceFromUrlHelper;
use App\Helpers\TelegramHelper;
use App\Helpers\TinkoffKassaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function store(PaymentRequest $request)
    {
        // Цена за товар
        $ProductPrice = PriceFromUrlHelper::getPrice($request->payment_product_id);

        if (!$ProductPrice) {
            return [
                'error' => 'Не найдена цена'
            ];
        }

        // Юзер
        $password = Str::random(10);

        $data = $request->all();
        $data['password'] = Hash::make($password);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $user->update($data);
        } else {
            $user = User::create($data);
        }

        // Создание в нашей базе
        $request['amount'] = $ProductPrice;
        $request['user_id'] = $user->id;

        Payment::where([
            ['user_id', $user->id],
            ['payment_product_id', $request->payment_product_id],
        ])->delete();

        $payment = Payment::create($request->all());

        if (!$payment) {
            $user->delete();

            TelegramHelper::send([
                'text' => $user->email . ': ' . "\n" . 'Технические работы, попробуйте позже'
            ]);

            return [
                'error' => 'Технические работы, попробуйте позже'
            ];
        }

        // Создание в банке
        $BankPayment = TinkoffKassaHelper::createPayment((object)[
            'payment_id' => $payment->id,
            'amount' => $ProductPrice,
            'return_url' => route('index') . '?modal=success&payment_id=' . $payment->id,

            'email' => $request->email,
        ]);

        if ($BankPayment->success == false) {
            $payment->delete();
            $user->delete();

            TelegramHelper::send([
                'text' => $user->email . ': ' . "\n" . 'Банк не принял платеж'
            ]);

            return [
                'error' => 'Банк не принял платеж',
                'info' => $BankPayment->response
            ];
        }

        // Сохранение в нашей базе
        $payment->bank_payment_id = $BankPayment->response->PaymentId;
        $payment->bank_confirmation_url = $BankPayment->response->PaymentURL;
        $payment->save();

        TelegramHelper::send([
            'text' => $user->email . ': ' . "\n" . 'Перенаправлен на оплату'
        ]);

        return [
            'success' => true,
            'redirect' => $payment->bank_confirmation_url
        ];
    }
}
