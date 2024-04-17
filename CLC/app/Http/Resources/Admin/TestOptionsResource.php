<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TestOptionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => isset($this->lesson->name) ? $this->lesson->name : $this->name
        ];
    }
}
