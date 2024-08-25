<?php

namespace App\Services\Loggers;

class Email implements LogInterface
{
    public function send($message): void
    {
        echo $message . ' was send via email';
    }
}
