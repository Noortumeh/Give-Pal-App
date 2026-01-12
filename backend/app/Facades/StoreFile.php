<?php

namespace App\Facades;

use App\Services\StoreFileService;
use Illuminate\Support\Facades\Facade;

class StoreFile extends Facade
{
   
    protected static function getFacadeAccessor(): string
    {
        return StoreFileService::class;
    }
}