<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class RegistrationController extends ClientBase
{
    public function register()
	{
		return view('pages.client.registrationPage');
	}
}
