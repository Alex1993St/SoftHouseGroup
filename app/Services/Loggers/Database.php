<?php

namespace App\Services\Loggers;


class Database
{
    public function send($message)
    {
        echo $message . ' was send via db';
    }
}
