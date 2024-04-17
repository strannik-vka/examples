<?php

namespace App\Http\Requests;

use App\Helpers\LeadersCompetitionHelper;
use App\Models\Application;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeadersCompetitionRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'birthday' => 'Формат даты: ' . date('d.m.Y'),
            'portfolio_team.mimes' => 'Поддерживаемый формат: pdf.',
            'portfolio_team.max' => 'Максимальный размер 15 мб.'
        ];
    }

    public function rules(): array
    {
        $data = [
            'name' => ['required', 'string', 'max:255'],
            'juridical_status' => ['required', 'string', 'max:255'],
            'activity_spheres' => ['required'],
            'activity_spheres.*' => ['required', Rule::in(LeadersCompetitionHelper::activitySphereIds())],
            'website' => ['required', 'string', 'max:255'],

            'fio' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:255'],
            'social_network' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'portfolio' => ['nullable', 'string', 'max:65535'],
            'source' => ['nullable', 'string', 'max:255'],

            'about_team' => ['required', 'string', 'max:1500'],
            // 'motivation' => ['required', 'string', 'max:1500'],
            'video' => ['required', 'string', 'max:65535'],

            'mission' => ['required', 'string', 'max:65535'],
            'social' => ['required', 'string', 'max:65535'],
            'economic' => ['required', 'string', 'max:65535'],
            'levels_media' => ['required', 'string', 'max:65535'],
        ];

        if (Application::where('user_id', request()->user()->id)->first()) {
            $data['portfolio_file'] = ['nullable', 'mimes:pdf', 'max:15360'];
            $data['portfolio_team'] = ['nullable', 'mimes:pdf', 'max:15360'];
        } else {
            $data['portfolio_team'] = ['required', 'mimes:pdf', 'max:15360'];
            $data['portfolio_file'] = ['required', 'mimes:pdf', 'max:15360'];
        }

        return $data;
    }
}
