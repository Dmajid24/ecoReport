<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginRedirectListener
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
    public function handle(Login $event): void
    {
        session(['after_login_role' => $event->user->Role]);
    }
}
