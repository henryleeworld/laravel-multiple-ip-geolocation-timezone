<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DateTimeZone;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        $timezoneCookie = request()->cookie('timezone'); 
        $timezone = (in_array($timezoneCookie, DateTimeZone::listIdentifiers())) ? $timezoneCookie : ((auth()->check()) ? auth()->user()->timezone : geoip()->getLocation(request()->ip())->timezone);
        config(['user.timezone' => $timezone]);
        // date_default_timezone_set($timezone);
    }
}
