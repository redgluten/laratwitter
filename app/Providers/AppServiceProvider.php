<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Set Carbon and PHP locale to the current app locale
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, 'fr_FR.utf8');

        // Convert instances of Faker to french locale
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('fr_FR');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
