<?php
namespace GetThingsDone\Account\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            session([ 'referrer' => session()->get('url.indended') ?? config('app.url') ]);

            return config('account.redirect_url');
        }

        return null;
    }
}
