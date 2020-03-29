<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    protected $addressTo;
    protected $title;
    protected $message;
    protected $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($addressTo, $title, $message, $attachment)
    {
        $this->addressTo = $addressTo;
        $this->title = $title;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachment = $this->attachment;
        return $this->to($this->addressTo)->subject($this->title)
            ->text('emails.contact_text')->with(['msg' => $this->message])
            ->attach($attachment['tmp_name'], [
                'as' => $attachment['name'],
                'mime' => $attachment['type']
            ]);
    }
}
