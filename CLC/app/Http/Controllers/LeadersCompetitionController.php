<?php

namespace App\Http\Controllers;

use App\Classes\Files;
use App\Helpers\LeadersCompetitionHelper;
use App\Http\Requests\LeadersCompetitionRequest;
use App\Mail\LeadersCompetitionMail;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadersCompetitionController extends Controller
{
    public function form()
    {
        $application = Application::where('user_id', request()->user()->id)->first();

        return view('profile.leaders-competition', [
            'winnerIsFound' => LeadersCompetitionHelper::winnerIsFound(),
            'isWinner' => LeadersCompetitionHelper::isWinner($application),
            'applicationsDeadlineIsUp' => LeadersCompetitionHelper::applicationsDeadlineIsUp(),
            'application' => $application,
            'activity_spheres_chunks' => collect(LeadersCompetitionHelper::$activitySpheres)->chunk(8)->all()
        ]);
    }

    public function birthday()
    {
        if (request('birthday')) {
            try {
                return Carbon::parse(request('birthday'))->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        return null;
    }

    public function after($application, $request)
    {
        if ($request->hasFile('portfolio_team')) {
            $portfolio_team = Files::upload($request, 'portfolio_team', 'portfolio_team');

            if ($portfolio_team) {
                Files::delete($application->portfolio_team);
                $application->portfolio_team = $portfolio_team;
                $application->save();
            }
        }

        if ($request->hasFile('portfolio_file')) {
            $portfolio_file = Files::upload($request, 'portfolio_file', 'portfolio_file');

            if ($portfolio_file) {
                Files::delete($application->portfolio_file);
                $application->portfolio_file = $portfolio_file;
                $application->save();
            }
        }
    }

    public function store(LeadersCompetitionRequest $request)
    {
        $Application = Application::where('user_id', $request->user()->id)->first();

        if ($Application) {
            return $this->update($request, $Application->id);
        }

        if (LeadersCompetitionHelper::applicationsDeadlineIsUp()) {
            return [
                'error' => 'Срок подачи заявки окончен'
            ];
        }

        $request['birthday'] = $this->birthday();

        $application = Application::create($request->all());

        $application->user_id = $request->user()->id;
        $application->save();

        $this->after($application, $request);

        try {
            Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
                'chat_id' => -1001920072961,
                'disable_web_page_preview' => true,
                'parse_mode' => 'HTML',
                'text' => "<b>НОВАЯ ЗАЯВКА</b>\nemail: $request->email"
            ]);

            Mail::to($request->user())->send(new LeadersCompetitionMail);
        } catch (\Exception $e) {
            Log::info('Не отправилось письмо "заявка успешно зарегистрирована", ' . $request->user()->email . '');
        }

        return [
            'success' => true,
            'data' => [
                'application' => $application
            ]
        ];
    }

    public function update(LeadersCompetitionRequest $request, $id)
    {
        if (LeadersCompetitionHelper::applicationsDeadlineIsUp()) {
            return [
                'error' => 'Срок подачи заявки окончен'
            ];
        }

        $request['birthday'] = $this->birthday();

        $application = Application::where([
            ['id', $id],
            ['user_id', $request->user()->id]
        ])->first();

        if (!$application) {
            return [
                'error' => 'Заявка не найдена'
            ];
        }

        $application->update($request->all());

        $application->status_id = null;
        $application->save();

        $this->after($application, $request);

        return [
            'success' => true,
            'data' => [
                'application' => $application
            ]
        ];
    }
}
