<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class ArticlesController extends ClientBase
{
    public function index()
	{
		return view('layouts.double', [
			'articles' => [],
			'page' => 'pages.client.articlesList',
		]);
	}
	
	
	public function one($id)
	{
		return view('layouts.double', [
			'page' => 'pages.client.articlePage',
			'title' => 'Article Title', 
			'article' => [
				'title' => 'Title', 
				'content' => 'Content'
			],
		]);
	}
}
