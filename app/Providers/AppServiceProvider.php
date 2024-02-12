<?php

namespace App\Providers;

use App\Helpers\GlobalHelper;
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
          if (class_exists(GlobalHelper::class)) {
            require_once app_path('Helpers/GlobalHelper.php');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}