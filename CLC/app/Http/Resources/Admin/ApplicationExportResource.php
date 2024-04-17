<?php

namespace App\Http\Resources\Admin;

use App\Helpers\LeadersCompetitionHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationExportResource extends JsonResource
{
    public function toArray($request)
    {
        $activitySpheresNames = implode(', ', LeadersCompetitionHelper::modelActivitySpheres($this->activity_spheres, 'name'));

        return [
            'user_name' => $this->user ? $this->user->name : '',
            'user_city' => $this->user ? $this->user->city : '',
            'user_about' => $this->user ? $this->user->about : '',
            'place_work' => $this->user ? $this->user->place_work : '',
            'name' => $this->name,
            'activity_spheres' => $activitySpheresNames,
            'juridical_status' => $this->juridical_status,
            'website' => $this->website,
            'fio' => $this->fio,
            'birthday' => $this->birthday->format('d.m.Y'),
            'email' => $this->email,
            'phone' => $this->phone,
            'social_network' => $this->social_network,
            'region' => $this->region,
            'city' => $this->city,
            'portfolio_file' => $this->portfolio ? $this->portfolio : ($this->portfolio_file ? config('app.url') . $this->portfolio_file : ''),
            'about_team' => $this->about_team,
            'motivation' => $this->motivation,
            'video' => $this->video,
            'portfolio_team' => $this->portfolio_team ? config('app.url') . $this->portfolio_team : '',
            'source' => $this->source,
            'mission' => $this->mission,
            'economic' => $this->economic,
            'social' => $this->social,
            'levels_media' => $this->levels_media,
            'created_at' => $this->created_at->format('d.m.Y H:i'),
            'total' => $this->evaluations_sum_total
        ];
    }
}
