<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class Registration extends ClientBase
{
    public function register()
	{
		$this->title = 'Регистрация';
		$this->content = view('registration');
		
		return $this->render();
	}
}
