<?php

namespace App\Listeners;

use App\Events\NewClientEvent;
use App\Mail\WelcomClientEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewClientListener implements ShouldQueue
{
    public $connection="database";

    public function handle(NewClientEvent $event)
    {
        Mail::To($event->client->name.'@gamil.com')
                ->send(new WelcomClientEmail($event->client));
    }

}
