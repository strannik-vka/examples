<?php

namespace App\Http\Controllers;

use App\Helpers\TinkoffKassaHelper;
use App\Helpers\UserHelper;
use App\Helpers\YooKassaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\CoursePrice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function store(PaymentRequest $request)
    {
        $return_url = null;
        $coursePrice = null;
        $user = null;
        $isNewUser = null;
        $password = Str::random(10);

        // Цена за курс
        if ($request->paymentable_type == 'App\Models\Course') {
            $coursePrice = CoursePrice::where('course_id', $request->paymentable_id)->first();

            if ($coursePrice) {
                $return_url = route('course.show', $coursePrice->course_id);
            }
        }

        if (!$coursePrice) {
            return [
                'error' => 'Не найдена цена за курс'
            ];
        }

        // Юзер
        if (Auth::check()) {
            $user = $request->user();
        } else {
            $isNewUser = true;
            $data = $request->all();
            $data['password'] = Hash::make($password);
            $user = User::create($data);

            Auth::login($user);
        }

        // Создание в нашей базе
        $request['amount'] = $coursePrice->amount;
        $request['user_id'] = $user->id;

        $payment = Payment::create($request->all());

        if (!$payment) {
            return [
                'error' => 'Технические работы, попробуйте позже'
            ];
        }

        // Создание в банке
        $BankPayment = TinkoffKassaHelper::createPayment((object)[
            'payment_id' => $payment->id,
            'amount' => $coursePrice->amount,
            'return_url' => $return_url,

            'email' => $request->email,
        ]);

        if ($BankPayment->success == false) {
            $payment->delete();

            if ($isNewUser) {
                $user->delete();
            }

            return [
                'error' => 'Банк не принял платеж',
            ];
        }

        // Сохранение в нашей базе
        $payment->bank_payment_id = $BankPayment->response->PaymentId;
        $payment->bank_confirmation_url = $BankPayment->response->PaymentURL;
        $payment->save();

        // Отправка доступов к ЛК
        if ($isNewUser) {
            UserHelper::sendAccountAccesses($user, $password);
        }

        return [
            'success' => true,
            'redirect' => $payment->bank_confirmation_url
        ];
    }
}
