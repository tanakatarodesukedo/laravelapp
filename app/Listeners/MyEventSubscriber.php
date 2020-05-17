<?php

namespace App\Listeners;

use App\Events\PersonEvent;

class MyEventSubscriber
{
    public function subscribe($events)
    {
        $events->listen(
            PersonEvent::class,
            PersonEventListener::class . '@handle'
        );
    }
}
