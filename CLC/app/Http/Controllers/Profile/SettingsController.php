<?php

namespace App\Http\Controllers\Profile;

use App\Classes\Files;
use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('profile.settings', [
            'user' => request()->user()
        ]);
    }

    public function update(UpdateRequest $request)
    {
        $user = $request->user();

        if (!request('password')) {
            unset($request['password']);
        }

        if (request('birthday')) {
            try {
                $request['birthday'] = Carbon::parse(request('birthday'))->format('Y-m-d');
            } catch (\Exception $e) {
                unset($request['birthday']);
            }
        }

        $user->update($request->all());

        if (request('password')) {
            $user->password = Hash::make(request('password'));
            $user->save();
        }

        if ($request->hasFile('photo')) {
            Files::$convert_to_webp = false;

            $photo = Files::upload($request, 'photo', 'user', UserHelper::$thumbs);

            if ($photo) {
                Files::delete($user->photo, UserHelper::$thumbs);
                $user->photo = $photo;
                $user->save();
            }
        }

        return [
            'success' => true
        ];
    }
}
