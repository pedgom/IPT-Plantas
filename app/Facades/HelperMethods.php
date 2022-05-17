<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HelperMethods extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'helperMethods';
    }
}
