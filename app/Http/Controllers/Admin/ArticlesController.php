<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ArticlesController extends AdminBase
{
    public function index()
	{
		return view('layouts.single', [
			'articles' => [],
			'page' => 'pages.admin.articlesList',
			'title' => 'Articles List', 
			'menu' => $this->menu, 
			'articles' => [],
		]);
	}
	
	
	public function one($id)
	{
		return view('layouts.single', [
			'page' => 'pages.admin.articlePage',
			'title' => 'Article with id ' . $id, 
			'menu' => $this->menu,
			'article' => [
				'title' => 'Title', 
				'content' => 'Content'
			],
			'id' => $id,
		]);
	}
	
	
	public function add()
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addArticle', 
			'title' => 'Add Article',
			'menu' => $this->menu, 
		]);
	}
	
	
	public function addPost()
	{
		
	}
	
	
	public function edit($id)
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addArticle', 
			'menu' => $this->menu, 
		]);
	}
	
	
	public function editPost($id)
	{
		
	}
	
	
	public function delete($id)
	{
		
	}
}
