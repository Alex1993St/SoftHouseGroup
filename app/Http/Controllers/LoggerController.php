<?php

namespace App\Http\Controllers;

use App\Enums\LoggerType;
use App\Http\Requests\LogAllRequest;
use App\Http\Requests\LogRequest;
use App\Http\Requests\LogToRequest;
use App\Services\LoggerInterface;

class LoggerController extends Controller
{
    /**
     * @param LogRequest $logRequest
     * @param LoggerInterface $logger
     * @return void
     */
    public function log(LogRequest $logRequest, LoggerInterface $logger)
    {
        $logger->send($logRequest->validated()['message']);
    }

    /**
     * @param LogToRequest $logRequest
     * @param LoggerInterface $logger
     * @return void
     */
    public function logTo(LogToRequest $logRequest, LoggerInterface $logger)
    {
        $request = $logRequest->validated();
        $logger->sendByLogger($request['message'], $request['type']);
    }

    /**
     * @param LogAllRequest $logRequest
     * @param LoggerInterface $logger
     * @return void
     */
    public function logToAll(LogAllRequest $logRequest, LoggerInterface $logger)
    {
        $message = $logRequest->validated()['message'];
        foreach (LoggerType::cases() as $type) {
            $logger->sendByLogger($message, $type->value);
        }
    }
}
