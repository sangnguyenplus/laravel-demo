<?php

namespace Org\Core\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Org\Core\Events\DemoEvent;
use Org\Core\Listeners\DemoListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        DemoEvent::class => [
            DemoListener::class,
        ]
    ];
}
