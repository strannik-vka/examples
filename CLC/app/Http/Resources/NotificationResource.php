<?php

namespace App\Http\Resources;

use App\Helpers\NotificationHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = NotificationHelper::typeData($this);

        $data->is_read = $this->is_read;
        $data->type_id = $this->type_id;

        return (array) $data;
    }
}
