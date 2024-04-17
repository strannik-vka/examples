<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $user = $request->user();
            $slug = $user->getGroup('slug');

            foreach ($roles as $role) {
                if ($slug == $role) {
                    return $next($request);
                }
            }
        }

        return redirect('login');
    }
}
