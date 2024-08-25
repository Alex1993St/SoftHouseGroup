<?php

namespace App\Enums;

enum LoggerType: string
{
    case Email = 'email';
    case Database = 'database';
    case File = 'file';
}
