<?php

namespace App\Listeners\registration;

use App\Jobs\MailSendingJob;
use App\Mail\MarkDownMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MailSendListener implements ShouldQueue
{
    public int $delay = 1;
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new MarkDownMail($event->user));

    }
}
