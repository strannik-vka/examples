<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $items = User::latest();

        $items = Filter::apply([
            'id', 'name', 'email', 'group_id', 'subtype_id', 'created_at'
        ], $request, $items);

        if ($request->has('excel')) {
            return Excel::download(new UsersExport($items->get()), 'users.xlsx');
        }

        return [
            'paginate' => $items->paginate(50),
            'group' => User::$groups,
            'subtype' => User::$subtypes
        ];
    }

    public function store(Request $request)
    {
        if ($request->email) {
            if (strpos($request['email'], '@') === false) {
                $request['email'] = $request['email'] . '@creative-leaders.ru';
            }
        } else {
            $request['email'] = Str::random(12) . '@creative-leaders.ru';
        }

        if (!$request->password || $request->password == '') {
            $request['password'] = Str::random(8);
            $request['password_confirmation'] = $request['password'];
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'group_id' => 'required|numeric',
            'subtype_id' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = User::create($request->all());

        $this->after($user, $request);

        return ['success' => $this->edit($user->id)];
    }

    public function edit($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validator_arr = [];

        foreach ([
            'name' => 'required',
            'group_id' => 'required|numeric',
            'subtype_id' => 'required|numeric',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        if ($request->email && $request->email != $user->email) {
            $validator_arr['email'] = 'required|email|unique:users';
        }

        if ($request->password) {
            $validator_arr['password'] = 'required|min:8|confirmed';
        } else {
            unset($request['password']);
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user->update($request->all());

        $this->after($user, $request);

        return ['success' => $this->edit($user->id)];
    }

    public function after($user, $request)
    {
        if ($request->group_id) {
            $user->group_id = $request->group_id;
            $user->save();
        }

        if ($request->subtype_id) {
            $user->subtype_id = $request->subtype_id;
            $user->save();
        }

        if (isset($request['password']) && $request['password']) {
            if (in_array($user->group_id, [3])) {
                $user->password_view = $request['password'];
            }

            $user->password = Hash::make($request['password']);
            $user->save();
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            User::destroy($id);
        }

        return ['success' => true];
    }
}
