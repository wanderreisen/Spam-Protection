<?php

namespace Wanderreisen\SpamProtection\Facades;

use Illuminate\Support\Facades\Facade;

class SpamProtection extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'spamprotection';
    }
}
