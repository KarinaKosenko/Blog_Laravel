<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Menu;
use App\Http\Requests\StoreGuestbookMessage;


class GuestbookController extends AdminBase
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
			
		return view('layouts.single', [
			'page' => 'pages.admin.messagesList',
			'title' => 'Message List', 
			'menu' => $this->menu,
			'messages' => $messages,
		]);
	}
	
	
	public function add()
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addMessage',
			'title' => 'Add Message', 
			'menu' => $this->menu,
			'msg' => 'Пожалуйста, добавьте сообщение.',
		]);
	}
	
	
	public function addPost(Request $request, StoreGuestbookMessage $rules)
	{
		$newMessage = new Message();
		$newMessage->name = $request->name;
		$newMessage->text = $request->text;
		$newMessage->save();
		
		return redirect()
			->route('admin.guestbook.index');
	}
	
	
	public function edit($id)
	{
		$message = Message::findOrFail($id);
		
		return view('layouts.single', [
			'page' => 'pages.admin.addMessage',
			'title' => 'Edit Message' . $id, 
			'menu' => $this->menu,
			'message' => $message,
			'msg' => 'Пожалуйста, отредактируйте сообщение.',
		]);
	}
	
	
	public function editPost($id, Request $request, StoreGuestbookMessage $rules)
	{
		$message = Message::findOrFail($id);
		
		$message->name = $request->name;
		$message->text = $request->text;
		$message->save();
		
		return redirect()
			->route('admin.guestbook.index');
	}
	
	
	public function delete($id)
	{
		$message = Message::findOrFail($id);
		$message->delete();
		
		return redirect()
			->route('admin.guestbook.index');
	}
}
