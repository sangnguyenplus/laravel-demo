<?php

namespace Org\Core\Facades;

use Illuminate\Support\Facades\Facade;

class CoreFacadeLoadedDirectlyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'core';
    }
}
