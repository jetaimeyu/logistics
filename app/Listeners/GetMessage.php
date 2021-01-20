<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use App\Jobs\MessageJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Filesystem\Cache;
use Illuminate\Queue\InteractsWithQueue;

class GetMessage implements ShouldQueue
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
     * @param object $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        dispatch(new MessageJob("heieheieh", 20));
//        cache()->store('redis')->put('message', $event->message);
    }
}
