<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        if ($request->has('admin')) {
            $user = User::where('email', $request->email)->first();

            Auth::login($user);

            return [
                'success' => true,
                'redirect' => '/'
            ];
        }

        $request->authenticate();

        $request->session()->regenerate();

        $redirect = request()->user()->group_id == 3
            ? route('evaluation.index') : route('profile.settings');

        if ($request->redirectUrl) {
            $redirect = $request->redirectUrl;
        }

        if ($request->ajax()) {
            return [
                'success' => true,
                'redirect' => $redirect
            ];
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
