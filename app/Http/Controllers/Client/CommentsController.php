<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\StoreBlogComment;


class CommentsController extends ClientBase
{
    public function add($article_id)
	{
		return view('layouts.double', [
			'page' => 'pages.client.addComment', 
			'title' => 'Add Comment',
			'menu' => $this->menu, 
			'recent_posts' => $this->recent_posts,
			'msg' => 'Пожалуйста, добавьте комментарий.',
		]);
	}
	
	
	public function addPost($article_id, Request $request, StoreBlogComment $rules)
	{
		$newComment = Comment::create([
			'author' => Auth::user()->name,
			'text' => $request->text,
			'article_id' => $article_id,
		]);
		
		return redirect()
			->route('public.articles.one', ['article_id' => $article_id]);
	}
}
