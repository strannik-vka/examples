<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LessonOpenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $urlUnSubscribe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;

        // for unsubscribe link

        $this->urlUnSubscribe = route('mailing.unsubscribe')
            . '?id=' . $user->id . '&email=' . $user->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->subject('Урок №24 открыт!')
            ->view('mailing.lesson_open');
    }
}
