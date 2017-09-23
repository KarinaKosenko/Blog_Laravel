<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\ImageHelper;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include app_path('Custom' . DIRECTORY_SEPARATOR . 'Helpers.php');
    }


    public function register()
    {
        //
    }
}
