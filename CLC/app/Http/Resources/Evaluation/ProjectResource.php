<?php

namespace App\Http\Resources\Evaluation;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->project_id,
            'name' => $this->project ? ($this->project->fio . ', ' . $this->project->name) : null,
            'eval' => $this->completed ? '+' : '-',
            'total' => $this->total,
            'comment' => $this->comment,
            'file' => $this->project ? $this->project->file : null,
            'url' => Route('evaluation.process') . '?project_id=' . $this->project_id
        ];
    }
}
