<?php

namespace App\Listeners;

use App\Events\ScopedEvent;

class ScopedEventListener
{
    /**
     * Create the event subscriber.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function onRecieved(ScopedEvent $event) {
        request()->merge(['recieved' => $event->message]);
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ScopedEvent',
            'App\Listeners\ScopedEventListener@onRecieved'
        );
    }
}