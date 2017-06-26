<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\StoreBlogComment;


class CommentsController extends ClientBase
{
    public function add($article_id, $parent_id = null)
	{
	    return view('layouts.double', [
			'page' => 'pages.client.addComment', 
			'title' => 'Add Comment',
			'menu' => $this->menu, 
			'recent_posts' => $this->recent_posts,
			'msg' => 'Пожалуйста, добавьте комментарий.',
		]);
	}
	
	
	public function addPost($article_id, Request $request, StoreBlogComment $rules, $parent_id = null)
	{
		$newComment = Comment::create([
			'user_id' => Auth::user()->id,
			'text' => $request->text,
			'article_id' => $article_id,
            'parent_id' => $parent_id,
		]);
		
		return redirect()
			->route('public.articles.one', ['article_id' => $article_id]);
	}


    public function edit($article_id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $this->authorize('update', $comment);

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
        $this->authorize('update', $comment);

        $comment->update([
            'text' => $request->text,
        ]);

        return redirect()
            ->route('public.articles.one', ['article_id' => $article_id]);
    }


    public function delete($article_id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $this->authorize('delete', $comment);

        $comment->update([
            'text' => 'Комментарий удален.',
        ]);

        return redirect()
            ->route('public.articles.one', ['article_id' => $article_id]);
    }
}
