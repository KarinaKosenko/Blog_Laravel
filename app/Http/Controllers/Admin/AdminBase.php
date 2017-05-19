<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*
 * Базовый контроллер для всех остальных контроллеров админки.
 */

class AdminBase extends Controller
{
    public $title;
	public $content;
	
	
	public function __construct()
	{
		$this->title = '';
		$this->content = '';
	}
	
	
	public function render()
	{
		return view('main', ['title' => $this->title, 'content' => $this->content]);
	}
}
