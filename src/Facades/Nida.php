<?php

namespace Alphaolomi\Nida\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alphaolomi\Nida\Nida
 */
class Nida extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-nida';
    }

    
}
