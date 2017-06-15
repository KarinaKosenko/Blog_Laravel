<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Comment;
use App\Http\Requests\AddBlogArticle;
use Illuminate\Validation\Rule;


class ArticlesController extends AdminBase
{
	
	public function index()
	{
		$articles = Article::orderBy('created_at', 'desc')
            ->paginate(5);
			
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
        $comments = $article->comments->sortByDesc('created_at');
		
		return view('layouts.single', [
			'page' => 'pages.admin.articlePage',
			'title' => 'Article ' . $article->title, 
			'menu' => $this->menu,
			'article' => $article,
			'comments' => $comments,
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
	
	
	public function addPost(Request $request, AddBlogArticle $rules)
	{
		$newArticle = Article::create([
			'title' => $request['title'],
			'content' => $request['content'],
			'author' => Auth::user()->name,
		]);
		
		return redirect()
			->route('admin.articles.index');
	}
	
	
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		
		return view('layouts.single', [
			'page' => 'pages.admin.addArticle', 
			'title' => 'Edit Article ' . $article->title,
			'menu' => $this->menu,
			'article' => $article,
			'msg' => 'Пожалуйста, отредактируйте статью.',
		]);
	}
	
	
	public function editPost($id, Request $request)
	{
		$article = Article::findOrFail($id);
		
		$this->validate($request, [
			'title' => [
				'required',
				Rule::unique('articles')->ignore($article->id)
			],
			'content' => 'required|max:300|min:10',
		]);
		
		$article->update($request->all());
		
		return redirect()
			->route('admin.articles.index');
	}
	
	
	public function delete($id)
	{
		$article = Article::findOrFail($id)
		    ->delete();
		
		return redirect()
			->route('admin.articles.index');
	}
}
