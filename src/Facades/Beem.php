<?php

namespace Tomsgad\Beem\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tomsgad\Beem\Beem
 */
class Beem extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-beem';
    }
}
