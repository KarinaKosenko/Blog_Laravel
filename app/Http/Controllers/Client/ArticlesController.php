<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Comment;


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
	    $comments = Comment::where('article_id', $id)
            ->where('parent_id', null)
            ->get();
        $authStatus = Auth::check();

		return view('layouts.double', [
			'page' => 'pages.client.articlePage',
			'title' => 'Article ' . $article->title, 
			'article' => $article,
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
			'comments' => view('pages.client.commentsWrapper', [
			    'authStatus' => $authStatus,
			    'comments' => $comments,
                'article' => $article,
            ]),
		]);
	}
}
