<?php

namespace App\Console\Commands;

use App\Exports\ApplicationExport;
use App\Mail\ApplicationsSendMail;
use App\Models\Application;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationsSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'applications:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправка заявок на почту';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = Application::with('user')->orderBy('created_at', 'desc');

        Excel::store(new ApplicationExport($items->get()), 'tmp/applications.xlsx');

        Mail::to([
            ['email' => 's.sysoevaa@gmail.com'],
            ['email' => 'canbka13@gmail.com'],
            // ['email' => 'kengarden18@gmail.com'],
        ])->send(new ApplicationsSendMail());

        $this->info('ok');
    }
}
