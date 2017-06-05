<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;


class ArticlesController extends ClientBase
{
    public function index()
	{
		$articles = Article::all()
			->sortByDesc('created_at');
		
		$this->menu = Menu::setMenuIsActive($this->menu, 'index');
		
		return view('layouts.double', [
			'articles' => $articles,
			'page' => 'pages.client.articlesList',
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}
	
	
	public function one($id)
	{
		$article = Article::findOrFail($id);
		
		return view('layouts.double', [
			'page' => 'pages.client.articlePage',
			'title' => 'Article with id ' . $id, 
			'article' => $article,
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}
}
