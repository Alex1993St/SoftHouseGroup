<?php

namespace App\Services;

use App\Enums\LoggerType;
use App\Services\Loggers\Database;
use App\Services\Loggers\Email;
use App\Services\Loggers\File;

class Logger implements LoggerInterface
{
    public $type;

    public function __construct()
    {
        $this->default = config('log.default');
    }

    /**
     *	Sends message to current logger.
     *
     *	@param string $message
     *
     *	@return void
     */
    public function send(string $message): void
    {
        $this->type
            ? $this->sendByLogger($message, $this->type)
            : $this->default->send($message);
    }

    /**
     *	Sends message by selected logger.
     *
     *	@param string $message
     *	@param string $loggerType
     *
     *	@return void
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        match ($loggerType) {
            LoggerType::Email->value => app(Email::class)->send($message),
            LoggerType::Database->value => app(Database::class)->send($message),
            LoggerType::File->value => app(File::class)->send($message),
            default => $this->default->send($message)
        };

    }

    /**
     *	Gets current logger type.
     *
     *	@return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     *	Sets current logger type.
     *
     *	@param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}

