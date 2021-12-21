<?php

namespace App\Http\Services;

use App\Models\FeedbackForm;

class DbFeedbackCreationService implements FeedbackCreationInterface
{
    private string $connectionName;

    /**
     * @param string $connectionName
     */
    public function __construct(string $connectionName)
    {
        $this->connectionName = $connectionName;
    }

    /**
     * @param string $name
     * @param string $phone
     * @param string $message
     * @return void
     */
    public function create(string $name, string $phone, string $message): void
    {
        $feedback = new FeedbackForm();

        $feedback->setConnection($this->connectionName);

        $feedback->name = $name;
        $feedback->phone = $phone;
        $feedback->message = $message;

        $feedback->save();
    }
}
