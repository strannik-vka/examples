<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationExportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'fio' => $this->project ? $this->project->fio : '',
            'name' => $this->project ? $this->project->name : '',
            'about_team' => $this->project ? $this->project->about_team : '',
            'video' => $this->project ? $this->project->video : '',
            'expert' => $this->user ? $this->user->name : null,
            'total' => $this->total,
            'comment' => $this->comment,
            'portfolio' => $this->project && $this->project->portfolio_team ? config('app.url') . $this->project->portfolio_team : '',
        ];
    }
}
