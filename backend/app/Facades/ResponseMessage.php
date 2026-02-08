<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\ResponseService;

class ResponseMessage extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return ResponseService::class;
    }
}
