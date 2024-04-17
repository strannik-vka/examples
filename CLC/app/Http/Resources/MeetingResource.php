<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'thumb' => ImageUrl($this->image, 640),
            'category' => $this->category ? [
                'name' => $this->category->name,
                'icon' => '/assets/images/block/meeting/category/' . $this->category->slug . '.svg'
            ] : null,
            'url' => Route('meeting.show', $this->id),
            'date' => $this->created_at->format('d.m.Y'),
            'shortText' => $this->shortText()
        ];
    }
}
