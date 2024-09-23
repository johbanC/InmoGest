<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Facades\Image; // Asegúrate de que esta línea esté presente
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

     
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

