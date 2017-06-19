<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\StoreBlogComment;


class CommentsController extends AdminBase
{
    public function add($article_id)
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addComment',
			'title' => 'Add Comment',
			'menu' => $this->menu, 
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
			->route('admin.articles.one', ['article_id' => $article_id]);
	}
	
	
	public function edit($article_id, $comment_id)
	{
		$comment = Comment::findOrFail($comment_id);
		
		return view('layouts.single', [
			'page' => 'pages.admin.addComment', 
			'title' => 'Edit Comment ' . $comment->id,
			'menu' => $this->menu,
			'comment' => $comment,
			'msg' => 'Пожалуйста, отредактируйте комментарий.',
		]);
	}
	
	
	public function editPost($article_id, $comment_id, Request $request, StoreBlogComment $rules)
	{
		$comment = Comment::findOrFail($comment_id);
		
		$comment->update([
			'text' => $request->text,
		]);
		
		return redirect()
			->route('admin.articles.one', ['article_id' => $article_id]);
	}
	
	
	public function delete($article_id, $comment_id)
	{
		$comment = Comment::findOrFail($comment_id);
		
		$comment->update([
			'text' => 'Комментарий удален.',
		]);
		
		return redirect()
			->route('admin.articles.one', ['article_id' => $article_id]);
	}
}
