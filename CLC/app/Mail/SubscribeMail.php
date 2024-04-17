<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $type_id;

    public function __construct($type_id)
    {
        $this->type_id = $type_id;
    }

    public function build()
    {
        if ($this->type_id == '1') {
            return $this->subject('Чек-лист креативного лидера')
                ->attach(public_path('docs/check-list.pdf'))
                ->view('mailing.check_list');
        }

        return $this->subject('Чек-лист эффективности управления')
            ->attach(public_path('docs/check-list-effective.pdf'))
            ->view('mailing.check_list_effective');
    }
}
