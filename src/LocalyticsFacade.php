<?php

namespace Superbalist\LaravelLocalyticsPush;

use Illuminate\Support\Facades\Facade;

class LocalyticsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'localytics';
    }
}
