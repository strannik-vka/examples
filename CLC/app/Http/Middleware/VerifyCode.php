<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyCode
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route()->getName() == 'logout') {
            return $next($request);
        }

        if (Auth::check()) {
            $user = Auth::user();

            if (
                !$user->email_verified_at &&
                strpos($request->route()->getName(), 'verify.code') === false
            ) {
                return redirect(Route('verify.code'));
            }
        }

        return $next($request);
    }
}
