<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $course;
    public $urlUnSubscribe;

    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
        $this->urlUnSubscribe = route('mailing.unsubscribe')
            . '?id=' . $user->id . '&email=' . $user->email;
    }

    public function build()
    {
        return $this->subject('Вы получили сертификат за прохождение курса!')
            ->view('mailing.certificate');
    }
}
