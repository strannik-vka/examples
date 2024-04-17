<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\VerifyCodeHelper;
use App\Http\Controllers\Controller;

class VerifyCodeController extends Controller
{
    public function index()
    {
        return view('auth.verify-code');
    }

    public function check()
    {
        $user = request()->user();

        $isVerify = VerifyCodeHelper::check($user, request('code'));

        if ($isVerify) {
            VerifyCodeHelper::activate($user);

            return [
                'success' => true,
                'redirect' => route('profile.settings')
            ];
        }

        return [
            'error' => 'Пожалуйста, проверьте <br> правильность кода активации'
        ];
    }

    public function store()
    {
        VerifyCodeHelper::store(request()->user());

        return [
            'success' => true
        ];
    }
}
