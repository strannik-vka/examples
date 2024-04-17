<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationHelper;
use App\Helpers\PaginateHelper;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::with('notificateable')->where([
            ['user_id', $request->user()->id],
            ['is_read', 1]
        ])->orderBy('id', 'desc');

        $paginate = $notifications->paginate(50);

        return PaginateHelper::setResource($paginate, NotificationResource::class);
    }

    public function new(Request $request)
    {
        NotificationHelper::newLessons();

        $notifications = Notification::with('notificateable')->where([
            ['user_id', $request->user()->id],
            ['is_read', 0]
        ])->orderBy('id', 'desc');

        $paginate = $notifications->paginate(20);

        return PaginateHelper::setResource($paginate, NotificationResource::class);
    }

    public function read()
    {
        Notification::where('user_id', request()->user()->id)->update([
            'is_read' => 1
        ]);

        return [
            'success' => true
        ];
    }
}
