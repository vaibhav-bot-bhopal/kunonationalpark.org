<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Tracker;

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
        Paginator::useBootstrap();
        
        view()->composer(['layouts.partial.footer'], function ($view) {
            // $trackers = Tracker::distinct()->get('ip');
            $trackers = Tracker::get('hits');
            $view->with('trackers', $trackers);
        });
    }
}
