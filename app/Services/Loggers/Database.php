<?php

namespace App\Services\Loggers;

class Database implements LogInterface
{
    public function send($message): void
    {
        echo $message . ' was send via db';
    }
}
