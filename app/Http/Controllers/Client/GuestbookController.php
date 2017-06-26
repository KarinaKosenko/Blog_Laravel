<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function edit($id)
    {
        $this->authorize('update', Message::class);
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
        $this->authorize('update', Message::class);

        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()
            ->route('public.guestbook.index');
    }


    public function delete($id)
    {
        $this->authorize('delete', Message::class);

        $message = Message::findOrFail($id)
            ->delete();

        return redirect()
            ->route('public.guestbook.index');
    }
	
}
