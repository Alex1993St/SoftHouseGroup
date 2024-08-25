<?php

namespace App\Services\Loggers;

class Email
{
    public function send($message)
    {
        echo $message . ' was send via email';
    }
}
