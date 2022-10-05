<?php

namespace Hydrat\LaravelDbDumper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hydrat\LaravelDbDumper\LaravelDbDumper
 */
class LaravelDbDumper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hydrat\LaravelDbDumper\LaravelDbDumper::class;
    }
}
