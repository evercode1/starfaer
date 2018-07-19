<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPostAlert;

class SendNewPostAlert implements ShouldQueue
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
     * @param  NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {

        Mail::to('ikon321@yahoo.com')->send(new NewPostAlert($event));
    }
}
