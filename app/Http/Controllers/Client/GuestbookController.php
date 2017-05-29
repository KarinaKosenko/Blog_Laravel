<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class GuestbookController extends ClientBase
{
    public function index()
	{
		return view('layouts.double', [
			'page' => 'pages.client.messagesList',
			'title' => 'Messages List', 
			'messages' => [],
		]);
	}
	
	
	public function add()
	{
		return view('layouts.double', [
			'page' => 'pages.client.addMessage',
			'title' => 'Add Message',
		]);
	}
	
	
	public function addPost()
	{
		
	}
	
}
