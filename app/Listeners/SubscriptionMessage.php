<?php

namespace App\Listeners;

use App\Models\NewsLetter;
use App\Events\UserSubscribed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionMessage
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
    public function handle(UserSubscribed $event): void
    {
        NewsLetter::create([
            'email' => $event->email,
        ]);



        // Mail::to($event->email)->send(new UserSubscribed());
    }
}
