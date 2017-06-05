<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Menu;


class ArticlesController extends AdminBase
{
	
	public function index()
	{
		$articles = Article::all()
			->sortByDesc('created_at');
			
		$this->menu = Menu::setMenuIsActive($this->menu, 'index');
		
		return view('layouts.single', [
			'articles' => $articles,
			'page' => 'pages.admin.articlesList',
			'title' => 'Articles List', 
			'menu' => $this->menu, 
		]);
	}
	
	
	public function one($id)
	{
		$article = Article::findOrFail($id);
		
		return view('layouts.single', [
			'page' => 'pages.admin.articlePage',
			'title' => 'Article with id ' . $id, 
			'menu' => $this->menu,
			'article' => $article,
		]);
	}
	
	
	public function add()
	{
		$this->menu = Menu::setMenuIsActive($this->menu, 'add_article');
		
		return view('layouts.single', [
			'page' => 'pages.admin.addArticle', 
			'title' => 'Add Article',
			'menu' => $this->menu, 
			'msg' => 'Пожалуйста, добавьте статью.',
		]);
	}
	
	
	public function addPost(Request $request)
	{
		$this->validate($request, getArticlesValidationMap('add'));
		
		$newArticle = new Article();
		$newArticle->title = $request->title;
		$newArticle->content = $request->content;
		$newArticle->author = Auth::user()->name;
		$newArticle->save();
		
		return redirect()
			->route('admin.articles.index');
	}
	
	
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		
		return view('layouts.single', [
			'page' => 'pages.admin.addArticle', 
			'menu' => $this->menu,
			'article' => $article,
			'msg' => 'Пожалуйста, отредактируйте статью.',
		]);
	}
	
	
	public function editPost($id, Request $request)
	{
		$article = Article::findOrFail($id);
		
		$this->validate($request, getArticlesValidationMap('edit'));
		
		$article->title = $request->title;
		$article->content = $request->content;
		$article->author = Auth::user()->name;
		$article->save();
		
		return redirect()
			->route('admin.articles.index');
	}
	
	
	public function delete($id)
	{
		$article = Article::findOrFail($id);
		$article->delete();
		
		return redirect()
			->route('admin.articles.index');
	}
}
