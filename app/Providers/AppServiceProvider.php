<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        // using bootstrap
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        // formatter rupiah menggunakan macro str::
        Str::macro('rupiah', function ($value) {
            return 'Rp. ' . number_format($value, 0, '.', '.');
        });
    }
}
