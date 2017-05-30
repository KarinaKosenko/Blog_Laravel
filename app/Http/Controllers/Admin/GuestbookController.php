<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class GuestbookController extends AdminBase
{
    public function index()
	{
		return view('layouts.single', [
			'page' => 'pages.admin.messagesList',
			'title' => 'Message List', 
			'menu' => $this->menu,
			'messages' => [],
		]);
	}
	
	
	public function add()
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addMessage',
			'title' => 'Add Message', 
			'menu' => $this->menu,
		]);
	}
	
	
	public function addPost()
	{
		
	}
	
	
	public function edit($id)
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addMessage',
			'title' => 'Edit Message', 
			'menu' => $this->menu,
		]);
	}
	
	
	public function editPost($id)
	{
		
	}
	
	
	public function delete($id)
	{
		
	}
}
