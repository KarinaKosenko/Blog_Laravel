<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Menu;

/*
 * Базовый контроллер для всех остальных контроллеров админки.
 */

abstract class AdminBase extends Controller
{
    protected $menu;
	
	public function __construct()
	{
        $this->menu = Cache::tags(['menu', 'admin'])
            ->remember('menu', env('CACHE_TIME', 0), function () {
            return Menu::where('panel_name', 'admin')
                ->get();
        });
	}
}
