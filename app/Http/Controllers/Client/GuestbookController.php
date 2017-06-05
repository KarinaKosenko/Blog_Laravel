<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Menu;


class GuestbookController extends ClientBase
{
    public function __construct()
	{
		parent::__construct();
		$this->menu = Menu::setMenuIsActive($this->menu, 'guestbook');
	}


   public function index()
	{
		$messages = Message::all()
			->sortByDesc('created_at');
		
		return view('layouts.double', [
			'page' => 'pages.client.messagesList',
			'title' => 'Messages List', 
			'messages' => $messages,
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}
	
	
	public function add()
	{
		return view('layouts.double', [
			'page' => 'pages.client.addMessage',
			'title' => 'Add Message',
			'msg' => 'Пожалуйста, добавьте сообщение.',
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}
	
	
	public function addPost(Request $request)
	{
		$this->validate($request, getMessagesValidationMap());
		
		$newMessage = new Message();
		$newMessage->name = $request->name;
		$newMessage->text = $request->text;
		$newMessage->save();
		
		return redirect()
			->route('public.guestbook.index');
	}
	
}
