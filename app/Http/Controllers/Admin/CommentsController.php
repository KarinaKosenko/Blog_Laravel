<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\StoreBlogComment;

/**
 * Class CommentsController - controller for comments for admin panel.
 */
class CommentsController extends AdminBase
{
    /**
     * Method for getting comment adding page.
     *
     * @param $article_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add($article_id)
	{
		return view('layouts.single', [
			'page' => 'pages.admin.addComment',
			'title' => 'Add Comment',
			'menu' => $this->menu, 
			'msg' => 'Пожалуйста, добавьте комментарий.',
		]);
	}

    /**
     * Method for comment validation and adding to database.
     *
     * @param $article_id
     * @param Request $request
     * @param StoreBlogComment $rules
     * @return \Illuminate\Http\RedirectResponse
     */
	public function addPost($article_id, Request $request, StoreBlogComment $rules)
	{
		$newComment = Comment::create([
			'user_id' => Auth::user()->id,
			'text' => $request->text,
			'article_id' => $article_id,
		]);
		
		return redirect()
			->route('admin.articles.one', ['article_id' => $article_id]);
	}

    /**
     * Method for getting comment editing page.
     *
     * @param $article_id
     * @param $comment_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Method for comment validation and editing.
     *
     * @param $article_id
     * @param $comment_id
     * @param Request $request
     * @param StoreBlogComment $rules
     * @return \Illuminate\Http\RedirectResponse
     */
	public function editPost($article_id, $comment_id, Request $request, StoreBlogComment $rules)
	{
		$comment = Comment::findOrFail($comment_id);
		
		$comment->update([
			'text' => $request->text,
		]);
		
		return redirect()
			->route('admin.articles.one', ['article_id' => $article_id]);
	}

    /**
     * Method for comment deleting.
     *
     * @param $article_id
     * @param $comment_id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function delete($article_id, $comment_id)
	{
		$comment = Comment::findOrFail($comment_id);
		
		$comment->update([
			'text' => 'Комментарий удален.',
		]);
		
		return redirect()
			->route('admin.articles.one', [
			    'article_id' => $article_id
            ]);
	}
}
