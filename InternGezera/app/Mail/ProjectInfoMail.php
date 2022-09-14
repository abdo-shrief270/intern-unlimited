<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectInfoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $totalUsers;
    public $totalClients;
    public $totalProducts;
    public $totalRoles;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->totalUsers=$data['totalUsers'];
        $this->totalClients=$data['totalClients'];
        $this->totalProducts=$data['totalProducts'];
        $this->totalRoles=$data['totalRoles'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Project Info')->markdown('Mails.ProjectInfoMail');

    }
}
