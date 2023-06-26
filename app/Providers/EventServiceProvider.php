<?php

namespace App\Providers;

use App\Events\UserSubscribed;
use App\Models\Message;
use App\Observers\MessageObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewMessageEvent::class => [
            NewMessageListener::class,
        ],
        UserSubscribed::class => [
            SubscriptionMessage::class,
        ],
        TestEvent::class => [
            Test::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Message::observe(MessageObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
