<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailingResource;
use Illuminate\Http\Request;
use App\Models\Mailing;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class MailingController extends Controller
{
    public function index(Request $request)
    {
        $items = Mailing::orderBy('sort', 'asc')->latest();

        $items = Filter::apply(['name', 'sort', 'view', 'status_id', 'users_filter', 'last_user_id', 'count_send', 'email_list'], $request, $items);

        $paginate = cursorPaginateCollection($items, 'MailingResource', 50);

        return [
            'paginate' => $paginate,
            'view' => Mailing::views(),
            'status' => Mailing::$statuses
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        if ($request->sort == '') {
            $request['sort'] = 500;
        }

        if ($request->email_list != '') {
            $request['email_list'] = explode(',', $request->email_list);
            $request['email_list'] = array_map('trim', $request['email_list']);
            $request['count_all'] = count($request['email_list']);
        } else {
            if ($request->users_filter) {
                $users = Filter::apply(
                    ['id', 'name', 'email', 'group_id', 'subtype_id'],
                    Mailing::filter($request->users_filter),
                    User::latest()
                );

                $request['count_all'] = $users->count();
            } else {
                $request['count_all'] = User::count();
            }
        }

        $mailing = Mailing::create($request->all());

        return ['success' => $this->edit($mailing->id)->original];
    }

    public function edit($id)
    {
        return response()->json(new MailingResource(Mailing::find($id)));
    }

    public function update(Request $request, Mailing $mailing)
    {
        $validator_arr = [];

        if ($request->name) {
            $validator_arr['name'] = 'required';
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        if ($request->sort == '') {
            $request['sort'] = 500;
        }

        if ($request->has('email_list')) {
            $request['email_list'] = explode(',', $request->email_list);
            $request['email_list'] = array_map('trim', $request['email_list']);
            $request['count_all'] = count($request['email_list']);
        }

        if (isset($request['users_filter']) && !$mailing->email_list) {
            if ($request->users_filter == null) {
                $request['count_all'] = User::count();
            } else {
                $users = Filter::apply(
                    ['id', 'name', 'email', 'group_id', 'subtype_id'],
                    Mailing::filter($request->users_filter),
                    User::latest()
                );

                $request['count_all'] = $users->count();
            }
        }

        if (isset($request['status_id'])) {
            if ($request->status_id == '0' || ($mailing->status_id == '3' && $request->status_id != '3')) {
                $request['count_send'] = 0;
                $request['last_user_id'] = null;
            }
        }

        $mailing->update($request->all());

        return ['success' => $this->edit($mailing->id)->original];
    }

    public function destroy($id)
    {
        Mailing::destroy($id);
        return ['success' => true];
    }
}
