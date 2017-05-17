<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*
 * Базовый контроллер для всех остальных контроллеров клиентской части.
 */

class ClientBase extends Controller
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
