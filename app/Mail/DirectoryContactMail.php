<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DirectoryContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_info;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_info)
    {
        $this->mail_info = $mail_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@globalprofessionalbusiness.com', 'GPB')
                    ->subject('[GPB] '.$this->mail_info['name'])
                    ->view('emails.directory_contact_form');
    }
}
