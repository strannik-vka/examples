<?php

namespace App\Http\Resources\Admin;

use App\Helpers\UserHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class UserExportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at->format('d.m.Y H:i'),
            'group' => UserHelper::getGroup($this->group_id, 'name'),
            'about' => $this->about,
            'birthday' => $this->birthday ? $this->birthday->format('d.m.Y') : '',
            'phone' => $this->phone,
            'city' => $this->city,
            'social_networks' => $this->social_networks,
            'place_work' => $this->place_work,
            'portfolio' => $this->portfolio,
            'photo' => $this->photo ? config('app.url') . $this->photo : '',
            'last_online_at' => $this->last_online_at ? $this->last_online_at->format('d.m.Y H:i') : '',
        ];
    }
}
