<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

/*
 * Базовый контроллер для всех остальных контроллеров админки.
 */

abstract class AdminBase extends Controller
{
    protected $menu;
	
	public function __construct()
	{
		$this->middleware('auth');
		$this->menu = Menu::where('panel_name', 'admin')
			->get();	
	}
}
