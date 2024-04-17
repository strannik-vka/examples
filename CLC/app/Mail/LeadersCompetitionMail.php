<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadersCompetitionMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Твоя заявка успешно зарегистрирована в конкурсе CLC!')
            ->view('mailing.leaders_competition_store');
    }
}
