<?php

namespace App\Services\Loggers;

class File implements LogInterface
{
    public function send($message): void
    {
        echo $message . ' was send via file';
    }
}
