<?php

namespace App\Console\Commands;

use App\Exports\UsersExport;
use App\Mail\UsersSendMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class UsersSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправка юзеров на почту';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = User::where('group_id', 1)->orderBy('created_at', 'desc');

        $lastFile = 'tmp/users-' . Carbon::now()->subDay()->format('Y-m-d') . '.xlsx';

        if (file_exists(storage_path('app/' . $lastFile))) {
            unlink(storage_path('app/' . $lastFile));
        }

        $fileName = 'tmp/users-' . date('Y-m-d') . '.xlsx';

        Excel::store(new UsersExport($items->get()), $fileName);

        Mail::to([
            ['email' => 's.sysoevaa@gmail.com'],
            ['email' => 'canbka13@gmail.com'],
            ['email' => 'Elena.grebeneva@gmail.com'],
        ])->send(new UsersSendMail($fileName));

        $this->info('ok');
    }
}
