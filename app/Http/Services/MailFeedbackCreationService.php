<?php

namespace App\Http\Services;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;

class MailFeedbackCreationService implements FeedbackCreationInterface
{

    /**
     * @param string $name
     * @param string $phone
     * @param string $message
     * @return void
     */
    public function create(string $name, string $phone, string $message): void
    {
        $details = [
            'name' => $name,
            'phone' => $phone,
            'message' => $message,
        ];

        Mail::to(config('mail.mailers.smtp.username'))->send(new FeedbackMail($details));
    }
}
