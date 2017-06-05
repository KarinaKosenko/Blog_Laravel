<?php

namespace App\Providers;

use App\Custom\MenuGenerator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu;

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
		include app_path('Custom' . DIRECTORY_SEPARATOR . 'ValidationMaps.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
