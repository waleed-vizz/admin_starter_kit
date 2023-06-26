<?php

namespace App\Listeners;

use App\Models\Message;
use App\Events\TestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Test
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
    public function handle(TestEvent $event): void
    {
        dd('hello world');
        // $message = $event->message;

        $data = [
            'sender_id' => 7,
            'receiver_id' => 4,
            'message' => 'hello event is trigered',

        ];
        try {
            $message_sent = Message::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
