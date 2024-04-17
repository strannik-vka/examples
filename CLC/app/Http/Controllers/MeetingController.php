<?php

namespace App\Http\Controllers;

use App\Classes\Filter;
use App\Helpers\PaginateHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        return request()->ajax()
            ? $this->list()
            : view('meeting.index');
    }

    public function list()
    {
        $items = Meeting::with('category')->where('published', 1)->orderBy('created_at', 'desc');

        $request = request();

        $items = Filter::apply(['category_id'], $request, $items);

        $paginate = request('paginate') && request('paginate') < 30 ? request('paginate') : 9;

        $items = PaginateHelper::setResource($items->paginate($paginate), MeetingResource::class);

        return $items;
    }

    public function show($id)
    {
        $meeting = Meeting::with('user', 'category')->find($id);

        if (!$meeting) {
            abort(404);
        }

        $meeting->iframe_src = $meeting->iframe_src;

        return $meeting;
    }
}
