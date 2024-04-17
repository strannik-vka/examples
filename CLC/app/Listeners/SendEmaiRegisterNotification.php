<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;

class SendEmaiRegisterNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        try {
            $user = request()->user();

            Mail::send('mailing.registered', [
                'user' => $user,
            ], function ($message) use ($user) {
                $message
                    ->to($user->email)
                    ->subject('Ты зарегистрировался в команду «Лагерь креативных лидеров»!');
            });
        } catch (\Exception) {
        }
    }
}
