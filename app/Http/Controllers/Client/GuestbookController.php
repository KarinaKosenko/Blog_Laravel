<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class GuestbookController extends ClientBase
{
    public function index()
	{
		return view('pages.client.messagesList', ['title' => 'Main Page', 'messages' => []]);
	}
	
	
	public function add()
	{
		return view('pages.client.addMessage');
	}
	
}
