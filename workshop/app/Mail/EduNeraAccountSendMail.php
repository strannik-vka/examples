<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EduNeraAccountSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $password;

    public function __construct($user, $accountData)
    {
        $this->name = $user->name;
        $this->email = $accountData->email;
        $this->password = $accountData->password;
    }

    public function build()
    {
        $from = config('mail.from');
        $from['name'] = 'Сергей Насибян (онлайн-тренинг)';

        return $this
            ->from($from['address'], $from['name'])
            ->subject('Ваши данные для входа на онлайн-тренинг “Цели и ценности 2.0”')
            ->view('mailing.access');
    }
}
