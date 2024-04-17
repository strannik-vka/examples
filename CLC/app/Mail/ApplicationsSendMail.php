<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationsSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Заявки CLC')
            ->attach(storage_path('app/tmp/applications.xlsx'))
            ->view('mailing.empty_send');
    }
}
