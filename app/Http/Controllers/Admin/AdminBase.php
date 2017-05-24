<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*
 * Базовый контроллер для всех остальных контроллеров админки.
 */

abstract class AdminBase extends Controller
{
    protected $menu;
	
	public function __construct()
	{
		$this->menu = getAdminMenu();
	}
}
