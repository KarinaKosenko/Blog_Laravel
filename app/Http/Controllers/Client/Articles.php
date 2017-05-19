<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class Articles extends ClientBase
{
    public function index()
	{
		$this->title = 'Articles List';
		$this->content = view('one', ['title' => 'Test', 'content' => 'Articles List']); //поменять внутренний шаблон;
		
		return $this->render();
	}
	
	
	public function one($id)
	{
		$this->title = 'Article ' . $id;
		
		$title = 'Article Title';
		$content = 'Article Content';
		
		$this->content = view('one', ['title' => $title, 'content' => $content]);
		
		return $this->render();
	}
}
