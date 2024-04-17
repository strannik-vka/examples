<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        $arr = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255'],
            'phone' => 'required|string|max:255',
            'promo_code' => 'nullable|string|max:255',

            'paymentable_id' => 'required|integer',
            'paymentable_type' => 'required|string|max:255',
        ];

        if (!Auth::check()) {
            $arr['email'][] = 'unique:' . User::class;
        }

        return $arr;
    }
}
