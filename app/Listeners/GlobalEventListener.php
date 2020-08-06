<?php

namespace App\Listeners;

use App\Events\GlobalEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GlobalEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GlobalEvent  $event
     * @return void
     */
    public function handle(GlobalEvent $event)
    {
        request()->merge(['recieved' => $event->message]);
    }
}
