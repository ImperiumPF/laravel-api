<?php

namespace Imperium\Http\Middleware;

use Closure;
use Carbon\Carbon;

Class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check header request and determine localizaton (API only)
        $local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'pt';

        // now lets check the session because api doesnt have session
        if ( \Session::has('locale')) {
            $local = \Session::get('locale');
        }

        // Set the local
        \App::setLocale($local);
        // Set also the Carbon locale
        Carbon::setLocale($local);

        // Continue request
        return $next($request);
    }
}
