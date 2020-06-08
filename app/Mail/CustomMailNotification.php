<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailData;

    public function __construct($data)
    {
        //
        $this->mailData = new \stdClass();
        $this->mailData->title = $data['title'];
        $this->mailData->content = $data['content'];
        $this->mailData->attach = $data['attachment'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('custom.mail')->subject($this->mailData->title ?? 'Default')->attachFromStorage($this->mailData->attach);
    }
}
