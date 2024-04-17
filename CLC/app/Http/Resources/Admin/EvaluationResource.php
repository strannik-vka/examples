<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'expert' => $this->user ? $this->user->name : null,
            'name' => $this->project ? $this->project->name : '',
            'fio' => $this->project ? $this->project->fio : '',
            'total' => $this->total,
            'comment' => $this->comment,
            'updated_at' => $this->updated_at
        ];
    }
}
