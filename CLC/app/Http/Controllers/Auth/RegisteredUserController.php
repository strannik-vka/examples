<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function confirm(Request $request): View
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect(route('register'));
        }

        return view('auth.confirm-profile');
    }

    public function step1(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $params = [];

        foreach (['name', 'email', 'password', 'redirectUrl'] as $key) {
            if ($request->has($key)) {
                if ($request[$key]) {
                    $params[] = $key . '=' . $request[$key];
                }
            }
        }

        return [
            'success' => true,
            'redirect' => route('auth.confirm-profile') . '?' . implode('&', $params)
        ];
    }

    public function step2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect(route('register'));
        }

        $request->validate([
            'birthday' => ['required', 'date'],
            'city' => ['required', 'string', 'max:255'],
            'place_work' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
        ], [
            'birthday' => 'Формат даты: ' . date('d.m.Y'),
        ]);

        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        Auth::login($user);

        event(new Registered($user));

        return [
            'success' => true,
            'redirect' => $request->redirectUrl ? $request->redirectUrl : route('profile.settings')
        ];
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        event(new Registered($user));

        if ($request->ajax()) {
            return [
                'success' => true,
                'redirect' => $request->redirectUrl ? $request->redirectUrl : route('profile.settings')
            ];
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
