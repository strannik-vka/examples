<?php

namespace App\Console\Commands;

use App\Helpers\TelegramHelper;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyStatsTg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-stats-tg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Статистика по оплптам в тг за день';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $paymentsCount = Payment::where('created_at', '>', Carbon::now()->subDay())->count();
        $paymentsCompletedCount = Payment::where([
            ['created_at', '>', Carbon::now()->subDay()],
            ['status_id', 2]
        ])->count();

        TelegramHelper::send([
            'text' => 'Ежедневная статистика' . "\n" .
                'Кол-во заявок: ' . $paymentsCount . "\n" .
                'Кол-во оплат: ' . $paymentsCompletedCount
        ]);

        $this->info('ok');
    }
}
