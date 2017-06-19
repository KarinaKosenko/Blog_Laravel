<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Application;
use App\Models\Article;
use App\Models\Menu;


class ArticlesController extends ClientBase
{
    public function index()
	{
		$articles = Article::orderBy('created_at', 'desc')
            ->paginate(5);
		
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
		$comments = $article->comments->sortByDesc('created_at')->toArray();
		$commentsHelper = App()->make('commentsHelper');
		$commentsTree = $commentsHelper->getComments($commentsHelper->buildTree($comments), $id);

		return view('layouts.double', [
			'page' => 'pages.client.articlePage',
			'title' => 'Article ' . $article->title, 
			'article' => $article,
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
			'comments' => view('pages.client.commentsWrapper', [
			    'comments' => $commentsTree,
                'article' => $article,
            ]),
		]);
	}
}
