<?php

namespace App\Services\Loggers;

class File
{
    public function send($message)
    {
        echo $message . ' was send via file';
    }
}
