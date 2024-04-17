<?php

namespace App\Console\Commands;

use App\Models\Evaluation;
use App\Models\EvaluationPeriod;
use App\Models\Application;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class ProjectsForExpert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projects:expert {expert=null} {expert_except=null}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Распределение заявок для экспертов';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $PROJECT_EVALS_MIN = 5; // Минимум кол-во оценок на проект
        $EXPERT_EVALS_MAX = 30; // Максимум кол-во оценок на эксперта

        $projects = Application::doesnthave('evaluation')->where('status_id', 1)->get();

        $period = EvaluationPeriod::latest()->first();

        $expertId = $this->argument('expert') != 'null' ? $this->argument('expert') : null;
        $expertExceptId = $this->argument('expert_except') != 'null' ? $this->argument('expert_except') : null;

        if ($expertId) {
            $experts = User::select('id')->where('id', $expertId)->get();
        } else {
            $experts = User::select('id')->where('group_id', 3);

            if ($expertExceptId) {
                $experts->where('id', '!=', $expertExceptId);
            }

            $experts = $experts->get();
        }

        $experts = Arr::pluck($experts, 'id');

        $experts_count = count($experts);
        $projects_count = count($projects);

        if (!$experts_count) {
            return $this->error('Нет экспертов');
        }

        if (!$projects_count) {
            return $this->error('Нет проектов на оценку');
        }

        if ($experts_count < $PROJECT_EVALS_MIN) {
            return $this->error('Нужно как минимум ' . $PROJECT_EVALS_MIN . ' экспертов на 1 заявку');
        }

        $getMaxEvalExpert = $this->getMaxEvalExpert($experts, $projects_count, $PROJECT_EVALS_MIN);

        if ($getMaxEvalExpert > $EXPERT_EVALS_MAX) {
            return $this->error('На одного эксперта выходит: ' . $getMaxEvalExpert . ' оценок это бльше чем ' . $EXPERT_EVALS_MAX);
        }

        $number = 0;

        foreach ($projects as $project) {
            for ($i = 0; $i < $PROJECT_EVALS_MIN; $i++) {
                $Evaluation = new Evaluation();
                $Evaluation->user_id = $experts[$number];
                $Evaluation->project_id = $project->id;
                $Evaluation->period_id = $period->id;
                $Evaluation->save();

                $number++;

                if ($number == $experts_count) {
                    $number = 0;
                }
            }
        }

        return $this->info('Максимум на 1 эксперта вышло оценок: ' . $getMaxEvalExpert);
    }

    // Я кодер, а не математик, поэтому так
    public function getMaxEvalExpert($experts, $projects_count, $PROJECT_EVALS_MIN)
    {
        $map = [];

        $number = 0;
        $experts_count = count($experts);

        for ($ii = 0; $ii < $projects_count; $ii++) {
            for ($i = 0; $i < $PROJECT_EVALS_MIN; $i++) {
                if (isset($map[$experts[$number]])) {
                    $map[$experts[$number]]++;
                } else {
                    $map[$experts[$number]] = 1;
                }

                $number++;

                if ($number == $experts_count) {
                    $number = 0;
                }
            }
        }

        $maxCount = 0;

        foreach ($map as $count) {
            if ($count > $maxCount) {
                $maxCount = $count;
            }
        }

        return $maxCount;
    }
}
