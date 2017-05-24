<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ArticlesController extends AdminBase
{
    public function index()
	{
		return view('pages.admin.articlesList', ['title' => 'Main Page', 'menu' => $this->menu, 'articles' => []]);
	}
	
	
	public function one($id)
	{
		return view('pages.admin.articlePage', ['title' => 'Article Title', 'menu' => $this->menu, 'article' => ['title' => 'Title Admin', 'content' => 'Content'], 'id' => $id]);
	}
	
	
	public function add()
	{
		return view('pages.admin.addArticle', ['menu' => $this->menu]);
	}
	
	
	public function edit($id)
	{
		return view('pages.admin.addArticle', ['menu' => $this->menu]);
	}
	
	
	public function delete($id)
	{
		
	}
}
