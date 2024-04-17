<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LastOnlineAt
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = $request->user();

            if (!$user->last_online_at || $user->last_online_at->diffInMinutes(now()) > 5) {
                $user->last_online_at = now();
                $user->save();
            }
        }

        return $next($request);
    }
}
