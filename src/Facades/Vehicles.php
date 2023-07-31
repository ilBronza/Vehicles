<?php

namespace IlBronza\Vehicles\Facades;

use Illuminate\Support\Facades\Facade;

class Vehicles extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'vehicles';
    }
}
