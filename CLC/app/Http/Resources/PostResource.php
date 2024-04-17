<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'thumb' => ImageUrl($this->image, 640),
            'thumbLarge' => $this->image,
            'category' => $this->category ? [
                'name' => $this->category->name,
                'icon' => '/assets/images/block/post/category/' . $this->category->slug . '.svg'
            ] : null,
            'url' => Route('post.show', $this->id),
            'date' => $this->created_at->format('d.m.Y'),
            'shortText' => $this->shortText()
        ];
    }
}
