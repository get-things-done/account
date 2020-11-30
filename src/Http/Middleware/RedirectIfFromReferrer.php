<?php
namespace GetThingsDone\Account\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectIfFromReferrer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && filter_var(session()->get('referrer'), FILTER_VALIDATE_URL) )
        {
            $referrer = session()->get('referrer');
            session()->forget('referrer');
            return redirect( $referrer );
        }

        return $next($request);
    }
}