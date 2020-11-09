<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;


    public $reply;
    public $header_text;

    public function __construct($reply,$header_text)
    {
       $this-> reply=$reply;
       $this-> header_text=$header_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $content=$this->reply;
        $header_text=$this->header_text;

        return $this->from(Settings()->email)->view('Mail.replay',compact('content','header_text'))
            ->subject('Replay To Your Message');
    }
}
