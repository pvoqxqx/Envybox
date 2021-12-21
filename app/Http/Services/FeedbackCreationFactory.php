<?php

namespace App\Http\Services;

class FeedbackCreationFactory
{
    /**
     * @param string $type
     * @return FeedbackCreationInterface
     */
    public function create(string $type): FeedbackCreationInterface
    {
        switch ($type) {
            case FeedbackFormTypes::FILE:
                return new FileFeedbackCreationService();
            case FeedbackFormTypes::DB_PGSQL:
                return new DbFeedbackCreationService('pgsql');
            case FeedbackFormTypes::DB_MYSQL:
                return new DbFeedbackCreationService('mysql');
            case FeedbackFormTypes::EMAIL:
                return new MailFeedbackCreationService();
            default:
                throw new \RuntimeException('Такого типа не существует');
        }
    }
}
