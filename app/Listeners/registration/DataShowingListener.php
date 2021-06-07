<?php

namespace App\Listeners\registration;

use App\Events\RegistrationEvent;
use App\Mail\MarkDownMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class DataShowingListener
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
     * @param  RegistrationEvent  $event
     * @return void
     */
    public function handle(RegistrationEvent $event)
    {
        echo 'registration complate';
    }
}
