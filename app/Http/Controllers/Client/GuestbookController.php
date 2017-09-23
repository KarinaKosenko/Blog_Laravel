<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Menu;
use App\Http\Requests\StoreGuestbookMessage;

/**
 * Class GuestbookController - controller for guest book messages on the client side.
 */
class GuestbookController extends ClientBase
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
		
		return view('layouts.double', [
			'page' => 'pages.client.messagesList',
			'title' => 'Messages List', 
			'messages' => $messages,
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}

    /**
     * Method for getting message adding page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
			->route('public.guestbook.index');
	}

    /**
     * Method for getting message editing page.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        $this->authorize('update', Message::class);
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()
            ->route('public.guestbook.index');
    }

    /**
     * Method for message deleting.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->authorize('delete', Message::class);
        $message = Message::findOrFail($id)
            ->delete();

        return redirect()
            ->route('public.guestbook.index');
    }
	
}
