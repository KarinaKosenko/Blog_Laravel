<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use App\Models\Menu;

/**
 * Class FeedbackController - controller for feedback on the client side.
 */
class FeedbackController extends ClientBase
{
    /**
     * Method for getting feedback form page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function feedback()
    {
        $this->menu = Menu::setMenuIsActive($this->menu, 'feedback');

        return view('layouts.double', [
            'title' => 'Написать мне',
            'page' => 'pages.client.feedbackPage',
            'message' => 'Написать мне:',
            'recent_posts' => $this->recent_posts,
            'menu' => $this->menu,
        ]);
    }

    /**
     * Method for feedback message validation and sending to my mail.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function feedbackPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'text' => 'required|min:10',
        ]);

        Mail::to('karina_sobakar@mail.ru')
            ->send(new FeedbackMail($request->all()));

        return view('layouts.double', [
            'title' => 'Написать мне',
            'page' => 'pages.client.messageBlock',
            'message' => 'Ваше сообщение успешно отправлено.',
            'recent_posts' => $this->recent_posts,
            'menu' => $this->menu,
        ]);
    }
}
