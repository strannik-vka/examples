<?php

namespace App\Console\Commands;

use App\Models\Lesson;
use App\Models\Test;
use App\Models\TestAnswer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AnswersToTg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AnswersToTg:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправка ответов в тг';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = TestAnswer::with('user')->orderBy('created_at', 'asc')->get();

        foreach ($items as $answer) {
            $text = [];
            $typeText = [];
            $typeContent = [];

            if ($answer->file) {
                $typeText[] = 'Файл';
                $typeContent[] = '<a href="' . (config('app.url') . $answer->file) . '">Открыть файл</a>';
            }

            if ($answer->text) {
                $typeText[] = 'Текстовое поле';
                $typeContent[] = $answer->text;
            }

            $test = Test::find($answer->test_id);
            $lesson = Lesson::find($test->lesson_id);

            $text[] = 'Номер урока: ' . $lesson->number;
            $text[] = $answer->user->name;
            $text[] = implode(' и ', $typeText);
            $text[] = implode("\n", $typeContent);
            $text[] = $answer->created_at->format('Y-m-d H:i');
            $text[] = $answer->user->email;

            // Отправка в тг
            Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
                'chat_id' => -1001907721687,
                'disable_web_page_preview' => true,
                'parse_mode' => 'HTML',
                'text' => implode("\n", $text)
            ]);
        }

        $this->info('ok');
    }
}
