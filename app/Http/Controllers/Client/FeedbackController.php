<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use App\Models\Menu;

class FeedbackController extends ClientBase
{
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
