<?php

namespace App\Http\Middleware;

use Closure;
use DateTimeZone;
use Illuminate\Support\Facades\Cookie;

class TimezoneMiddleware
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
        $response = $next($request);
        $timezoneCookie = Cookie::get('timezone'); 
        if (($timezoneCookie  === null) || !in_array($timezoneCookie, DateTimeZone::listIdentifiers())) {
            return $response->withCookie(cookie()->forever('timezone', (auth()->check()) ? auth()->user()->timezone : geoip()->getLocation(request()->ip())->timezone));
        }
        return $response;
    }
}
