<?php

namespace App\Listeners;

use App\Events\NewChatMeassage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChatMessageNotification
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
     * @param  NewChatMeassage  $event
     * @return void
     */
    public function handle(NewChatMeassage $event)
    {
        //
    }
}
