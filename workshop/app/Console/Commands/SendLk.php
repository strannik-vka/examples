<?php

namespace App\Console\Commands;

use App\Helpers\EduNeraHelper;
use App\Mail\EduNeraAccountSendMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendLk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-lk {email} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправка лк юзеру';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');

        if (!$name) {
            $user = User::where('email', $this->argument('email'))->first();

            if (!$user) {
                return $this->error('Юзер не найден');
            }
        }

        $accountData = EduNeraHelper::ExternalSaleStore([
            'name' => $name ? $name : $user->name,
            'email' => $email,
            'phone' => isset($user->phone) ? $user->phone : '',
            'telegram' => isset($user->telegram) ? $user->telegram : '',
        ]);

        if (!isset($accountData->password)) {
            $this->error('Не смог зарегать юзера');

            return dd($accountData);
        }

        if (isset($user)) {
            try {
                Mail::to([
                    ['email' => $accountData->email]
                ])->send(new EduNeraAccountSendMail($user, $accountData));
            } catch (\Exception $e) {
                $this->error('Не отправилось письмо с лк ' . $e->getMessage());
            }

            $user->is_account_send = 1;
            $user->save();
        }

        dd($accountData);
    }
}
