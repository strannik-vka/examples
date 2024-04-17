<?php

namespace App\Listeners;

use App\Helpers\VerifyCodeHelper;

class SendEmailVerifyNotification
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
        VerifyCodeHelper::store(request()->user());
    }
}
