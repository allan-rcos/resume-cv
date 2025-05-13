<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Phone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'phone';
    }
}
