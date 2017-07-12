<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Comment;
use App\Http\Requests\AddBlogArticle;
use Illuminate\Validation\Rule;


class ArticlesController extends AdminBase
{
	
	public function index(Request $request)
	{
        if(isset($request->page)) {
            Cache::tags(['articles', 'list'])
                ->flush();
        }

        $articles = Cache::tags(['articles', 'list'])
            ->remember('admin', env('CACHE_TIME', 0), function () {
            return Article::with('user')
                ->latest()
                ->paginate(5);
        });

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
        $comments = Comment::where('article_id', $id)
            ->where('parent_id', null)
            ->get();

        return view('layouts.single', [
			'page' => 'pages.admin.articlePage',
			'title' => 'Article ' . $article->title, 
			'menu' => $this->menu,
			'article' => $article,
			'comments' => view('pages.admin.commentsWrapper', [
                'comments' => $comments,
                'article' => $article,
            ]),
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
            'user_id' => Auth::user()->id,
            'image_link' => $request['image_link'],
		]);

		Cache::tags(['articles', 'list'])
            ->flush();
		
		return redirect()
			->route('admin.articles.index');
	}
	
	
	public function edit($id)
	{
	    $article = Article::findOrFail($id);

        if (Gate::denies('to_edit_article', $article)) {
            abort(403);
        }

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

        if (Gate::denies('to_edit_article', $article)) {
            abort(403);
        }

		$this->validate($request, [
			'title' => [
				'required',
				Rule::unique('articles')->ignore($article->id)
			],
			'content' => 'required|max:300|min:10',
		]);
		
		$article->update($request->all());

        Cache::tags(['articles', 'list'])
            ->flush();
		
		return redirect()
			->route('admin.articles.index');
	}
	
	
	public function delete($id)
	{
		$article = Article::findOrFail($id);

        if (Gate::denies('to_delete_article', $article)) {
            abort(403);
        }

        $article->delete();

        Cache::tags(['articles', 'list'])
            ->flush();

        return redirect()
            ->route('admin.articles.index');
	}
}
