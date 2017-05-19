<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class Articles extends AdminBase
{
    public function index()
	{
		$this->title = 'Articles List Admin';
		$this->content = view('one', ['title' => 'Test', 'content' => 'Articles List']); //поменять внутренний шаблон;
		
		return $this->render();
	}
	
	
	public function one($id)
	{
		$this->title = 'Article ' . $id;
		
		$title = 'Article Title';
		$content = 'Article Content Admin';
		
		$this->content = view('one', ['title' => $title, 'content' => $content]);
		
		return $this->render();
	}
	
	
	public function add()
	{
		
	}
	
	
	public function edit($id)
	{
		
	}
	
	
	public function delete($id)
	{
		
	}
}
