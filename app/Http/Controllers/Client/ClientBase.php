<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Article;
use App\Models\Menu;

/*
 * Базовый контроллер для всех остальных контроллеров клиентской части.
 */

class ClientBase extends Controller
{
	protected $menu;
	protected $recent_posts;
	
	public function __construct()
	{
        $this->menu = Cache::tags(['menu', 'public'])
            ->remember('menu', env('CACHE_TIME', 0), function () {
            return Menu::where('panel_name', 'public')
                ->get();
        });

        $this->recent_posts = Cache::tags(['articles', 'recent'])
            ->remember('articles', env('CACHE_TIME', 0), function () {
            return Article::recent(3);
        });
	}
}
