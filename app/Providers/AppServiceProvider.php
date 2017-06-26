<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\CommentsHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        include app_path('Custom' . DIRECTORY_SEPARATOR . 'Helpers.php');
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
