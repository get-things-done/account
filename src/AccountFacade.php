<?php

namespace GetThingsDone\Account;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GetThingsDone\Account\Account
 */
class AccountFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'account';
    }
}
