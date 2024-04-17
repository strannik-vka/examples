<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Classes\Filter;
use App\Exports\ApplicationExport;
use App\Helpers\LeadersCompetitionHelper;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $items = Application::with('user')->orderBy('created_at', 'desc');

        $items = Filter::apply([
            'id', 'name', 'juridical_status',
            'activity_spheres', 'website', 'fio',
            'birthday', 'email', 'phone', 'social_network',
            'region', 'city', 'about_team', 'motivation',
            'portfolio', 'video',
            'created_at', 'status_id', 'user_id', 'portfolio_team',
            'mission', 'social', 'economic', 'levels_media'
        ], $request, $items);

        if ($request->has('excel')) {
            return Excel::download(
                new ApplicationExport($items->where('status_id', 1)->withSum('evaluations', 'total')->get()),
                'result.xlsx'
            );
        }

        return [
            'paginate' => $items->paginate(20),
            'activity_spheres' => LeadersCompetitionHelper::$activitySpheres,
            'status' => LeadersCompetitionHelper::$statuses,
            'user' => User::limit(10)->latest()->get(),
        ];
    }

    public function update(Request $request, $id)
    {
        $validator_arr = [];

        foreach ([
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
            'motivation' => ['required', 'string', 'max:1500'],
            'video' => ['required', 'string', 'max:65535'],

            'portfolio_file' => ['nullable', 'mimes:pdf', 'max:15360'],
            'portfolio_team' => ['nullable', 'mimes:pdf', 'max:15360'],
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Application = Application::find($id);

        $Application->update($request->all());

        if ($request->hasFile('portfolio_team')) {
            $portfolio_team = Files::upload($request, 'portfolio_team', 'portfolio_team');

            if ($portfolio_team) {
                Files::delete($Application->portfolio_team);
                $Application->portfolio_team = $portfolio_team;
                $Application->save();
            }
        }

        if ($request->hasFile('portfolio_file')) {
            $portfolio_file = Files::upload($request, 'portfolio_file', 'portfolio_file');

            if ($portfolio_file) {
                Files::delete($Application->portfolio_file);
                $Application->portfolio_file = $portfolio_file;
                $Application->save();
            }
        }

        if ($request->has('status_id')) {
            $Application->status_id = $request->status_id;
            $Application->save();
        }

        return ['success' => $this->edit($Application->id)];
    }

    public function edit($id)
    {
        return Application::with('user')->find($id);
    }
}
