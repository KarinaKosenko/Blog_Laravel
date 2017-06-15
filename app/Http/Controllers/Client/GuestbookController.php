<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Menu;
use App\Http\Requests\StoreGuestbookMessage;


class GuestbookController extends ClientBase
{
    public function __construct()
	{
		parent::__construct();
		$this->menu = Menu::setMenuIsActive($this->menu, 'guestbook');
	}


   public function index()
	{
		$messages = Message::orderBy('created_at', 'desc')
            ->paginate(5);
		
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
	
	
	public function addPost(Request $request, StoreGuestbookMessage $rules)
	{
		$newMessage = Message::create($request->all());
		
		return redirect()
			->route('public.guestbook.index');
	}
	
}
