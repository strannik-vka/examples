<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsersSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function build()
    {
        return $this->subject('Пользователи CLC')
            ->attach(storage_path('app/' . $this->fileName))
            ->view('mailing.empty_send');
    }
}
