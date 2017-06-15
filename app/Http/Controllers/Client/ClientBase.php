<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
		$this->menu = Menu::where('panel_name', 'public')
			->get();
		
		$this->recent_posts = Article::recent(3);
	}
}
