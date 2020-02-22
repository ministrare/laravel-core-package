<?php


namespace Ministrare\LaravelCorePackage\Facades;

use Illuminate\Support\Facades\Facade;


class Breadcrumb extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'breadcrumb';
    }
}
