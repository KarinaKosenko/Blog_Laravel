<?php

namespace App\Providers;

use App\Custom\MenuGenerator;
use Illuminate\Support\Facades\View;
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
        include app_path('Custom' . DIRECTORY_SEPARATOR . 'Helpers.php');
		
		/*View::composer('base', function ($view) {
			$view->with('menu', getMenu());
		});*/
		

		View::share('menu', getMenu());
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
