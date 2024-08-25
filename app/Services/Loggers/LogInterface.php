<?php

namespace App\Services\Loggers;

interface LogInterface
{
    public function send($message): void;
}
