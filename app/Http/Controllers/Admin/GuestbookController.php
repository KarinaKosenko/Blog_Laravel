<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class GuestbookController extends AdminBase
{
    public function index()
	{
		return view('pages.admin.messagesList', ['title' => 'Main Page', 'menu' => $this->menu, 'messages' => []]);
	}
	
	
	public function add()
	{
		return view('pages.admin.addMessage', ['menu' => $this->menu]);
	}
	
	
	public function edit($id)
	{
		return view('pages.admin.addMessage', ['menu' => $this->menu]);
	}
	
	
	public function delete($id)
	{
		
	}
}
