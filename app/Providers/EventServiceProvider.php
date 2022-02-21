<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\ExampleEvent;
use App\Listeners\ExampleListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<string,array<int,string>>
     */
    protected array $listen = [
        ExampleEvent::class => [
            ExampleListener::class,
        ],
    ];

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
