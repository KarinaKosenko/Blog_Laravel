<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class ArticlesController extends ClientBase
{
    public function index()
	{
		return view('pages.client.articlesList', ['articles' => []]);
	}
	
	
	public function one($id)
	{
		return view('pages.articlePage', ['title' => 'Article Title', 'article' => ['title' => 'Title', 'content' => 'Content']]);
	}
}
