<?php

namespace Alphaolomi\Nida\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getUserData()
 * @method static Nida setClient()
 *
 * @see \Alphaolomi\Nida\Nida
 */
class Nida extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-nida';
    }


}
