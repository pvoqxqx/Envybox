<?php

namespace App\Http\Services;

interface FeedbackCreationInterface
{
    /**
     * @param string $name
     * @param string $phone
     * @param string $message
     * @return void
     */
    public function create(string $name, string $phone, string $message): void;
}
