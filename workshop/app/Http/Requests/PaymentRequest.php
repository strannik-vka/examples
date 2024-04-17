<?php

namespace App\Http\Requests;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        $emailIsPayed = false;

        if (request('email') && request('payment_product_id')) {
            $user = User::where('email', request('email'))->first();

            if ($user) {
                $emailIsPayed = Payment::where([
                    ['user_id', $user->id],
                    ['payment_product_id', request('payment_product_id')],
                    ['status_id', 2]
                ])->count();
            }
        }

        $validate = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'telegram' => 'required|string|max:255',

            'payment_product_id' => 'required|integer|exists:payment_products,id',
        ];

        if ($emailIsPayed) {
            $validate['email'] = ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:' . User::class];
        } else {
            $validate['email'] = ['required', 'string', 'email:rfc,dns', 'max:255'];
        }

        return $validate;
    }
}
