<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomClientEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $client;

    public function __construct(Client $client)
    {
        $this->client=$client;
    }

    public function build()
    {
        return $this->from('Info@gezera.com','Gezera')
            ->to($this->client->name.'@gmail.com', $this->client->name)
            ->markdown('Mails.welcom-client-email')
            ->with([
                'client' => $this->client
            ]);
    }
}
