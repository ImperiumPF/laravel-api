<?php

namespace Imperium\Http\Middleware;

use App;
use Config;
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
        // Lets check the session because api doesnt have session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            // If requested by the api
                if ($request->acceptsJson() && $request->hasHeader('X-localization')) {  
                    $locale = $request->header('X-localization');
            } else {
                // lets get the locale from the browser headers
                $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

                // If the locale doesn't exists in our files, use the default locale
                if(!empty($locale) && !in_array($locale, Config::get('app.locales')))
                {
                    $locale = Config::get('app.locale');
                }
                // Put the locale value in the session
                Session::put('locale', $locale);
            }
        }

        App::setLocale($locale);
        Carbon::setLocale($locale);

        // Continue request
        return $next($request);
    }
}
