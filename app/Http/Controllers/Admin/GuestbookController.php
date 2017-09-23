<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Menu;
use App\Http\Requests\StoreGuestbookMessage;

/**
 * Class GuestbookController - controller for guest book messages for admin panel.
 */
class GuestbookController extends AdminBase
{
    public function __construct()
	{
		parent::__construct();
		$this->menu = Menu::setMenuIsActive($this->menu, 'guestbook');
	}

    /**
     * Method for getting a list of messages.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index()
	{
		$messages = Message::orderBy('created_at', 'desc')
            ->paginate(5);
			
		return view('layouts.single', [
			'page' => 'pages.admin.messagesList',
			'title' => 'Message List', 
			'menu' => $this->menu,
			'messages' => $messages,
		]);
	}

    /**
     * Method for getting message adding page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function add()
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addMessage',
			'title' => 'Add Message', 
			'menu' => $this->menu,
			'msg' => 'Пожалуйста, добавьте сообщение.',
		]);
	}

    /**
     * Method for message validation and adding to database.
     *
     * @param Request $request
     * @param StoreGuestbookMessage $rules
     * @return \Illuminate\Http\RedirectResponse
     */
	public function addPost(Request $request, StoreGuestbookMessage $rules)
	{
		$newMessage = Message::create($request->all());
		
		return redirect()
			->route('admin.guestbook.index');
	}

    /**
     * Method for getting message editing page.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Method for message validation and editing.
     *
     * @param $id
     * @param Request $request
     * @param StoreGuestbookMessage $rules
     * @return \Illuminate\Http\RedirectResponse
     */
	public function editPost($id, Request $request, StoreGuestbookMessage $rules)
	{
		$message = Message::findOrFail($id);
		
		$message->update($request->all());
		
		return redirect()
			->route('admin.guestbook.index');
	}

    /**
     * Method for message deleting.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function delete($id)
	{
		$message = Message::findOrFail($id)
		    ->delete();


		return redirect()
			->route('admin.guestbook.index');
	}
}
