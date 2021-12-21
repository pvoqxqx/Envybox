<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $details;

    /**
     * @param array $details
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    /**
     * @return FeedbackMail
     */
    public function build(): FeedbackMail
    {
        return $this->subject('User feedback form')->view('testMail');
    }
}
