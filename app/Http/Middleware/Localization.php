<?php

namespace Imperium\Http\Middleware;

use App;
use Session;
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
        $locale = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'pt';

        // now lets check the session because api doesnt have session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            // lets get the locale from the browser headers
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            // check if the locale exists in our files
            if(!in_array($locale, \Config::get('app.locales')))
            {
                $locale = en;
            }
            // Put the locale value in the session
            Session::put('locale', $locale);
        }
 
        App::setLocale($locale);
        Carbon::setLocale($locale);

        // Continue request
        return $next($request);
    }
}
