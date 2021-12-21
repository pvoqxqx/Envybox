<?php

namespace App\Http\Services;

abstract class FeedbackFormTypes
{
    public const EMAIL = 'email';
    public const DB_PGSQL = 'db_pgsql';
    public const DB_MYSQL = 'db_mysql';
    public const FILE = 'file';

    public const AVAILABLE_TYPES = [
        self::EMAIL,
        self::DB_PGSQL,
        self::DB_MYSQL,
        self::FILE,
    ];
}
