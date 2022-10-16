<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Score extends Mailable
{
    use Queueable, SerializesModels;

    public $type, $title, $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, $title, $content)
    {
        $this->type = $type;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.modules.score');
    }
}
