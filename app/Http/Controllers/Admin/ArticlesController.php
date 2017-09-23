<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Comment;
use Illuminate\Validation\Rule;
use App\Classes\Uploader;
use App\Models\Upload;

/**
 * Class ArticlesController - controller for articles for admin panel.
 */
class ArticlesController extends AdminBase
{
    /**
     * Method for getting a list of articles.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index(Request $request)
	{
	    if (isset($request->page)) {
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

    /**
     * Method for getting an article page (by id).
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Method for getting article adding page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function add(Request $request)
	{
		$this->menu = Menu::setMenuIsActive($this->menu, 'add_article');

		if ($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }
        else {
		    $fileError = null;
        }
		
		return view('layouts.single', [
			'page' => 'pages.admin.addArticle', 
			'title' => 'Add Article',
			'menu' => $this->menu, 
			'msg' => 'Пожалуйста, добавьте статью.',
            'fileError' => $fileError,
		]);
	}

    /**
     * Method for article validation and adding to database.
     *
     * @param Request $request
     * @param Uploader $uploader
     * @param Upload $uploadModel
     * @return $this|\Illuminate\Http\RedirectResponse
     */
	public function addPost(Request $request, Uploader $uploader, Upload $uploadModel)
	{
        $this->validate($request, [
            'title' => 'required|unique:articles|max:200|min:6',
            'content' => 'required|max:500|min:10',
        ]);

        if ($request->file) {
            if ($uploader->validate($request, 'file', config ('imagerules') )) {
                $uploadedPath = $uploader->upload(config('blog.imageUploadSection'));

                if ($uploadedPath !== false) {
                    $uploadsModel = $uploader->register($uploadModel);
                    $uploadedProps = $uploader->getProps();
                }
            }
            else {
                $message = implode($uploader->getErrors(), '. ');
                $request->session()->flash('fileError', $message);

                return redirect()
                    ->route('admin.articles.add')
                    ->withInput();
            }
        }

        $newArticle = Article::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => Auth::user()->id,
            'upload_id' => isset($uploadsModel) ? $uploadsModel->id : null,
        ]);

        Cache::tags(['articles', 'list'])
            ->flush();

        return redirect()
            ->route('admin.articles.index');
	}

    /**
     * Method for getting article editing page.
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function edit($id, Request $request)
	{
	    $article = Article::findOrFail($id);

        if (Gate::denies('to_edit_article', $article)) {
            abort(403);
        }

        if ($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }
        else {
            $fileError = null;
        }

        return view('layouts.single', [
            'page' => 'pages.admin.addArticle',
            'title' => 'Edit Article ' . $article->title,
            'menu' => $this->menu,
            'article' => $article,
            'msg' => 'Пожалуйста, отредактируйте статью.',
            'fileError' => $fileError,
        ]);
	}

    /**
     * Method for article validation and editing.
     *
     * @param $id
     * @param Request $request
     * @param Uploader $uploader
     * @param Upload $uploadModel
     * @return $this|\Illuminate\Http\RedirectResponse
     */
	public function editPost($id, Request $request, Uploader $uploader, Upload $uploadModel)
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
			'content' => 'required|max:500|min:10',
		]);

        if ($request->file) {
            if ($uploader->validate($request, 'file', config ('imagerules') )) {
                $uploadedPath = $uploader->upload(config('blog.imageUploadSection'));

                if ($uploadedPath !== false) {
                    $uploadsModel = $uploader->register($uploadModel);
                    $uploadedProps = $uploader->getProps();

                    $article->update([
                        'upload_id' => $uploadsModel->id
                    ]);
                }
            }
            else {
                $message = implode($uploader->getErrors(), '. ');
                $request->session()->flash('fileError', $message);

                return redirect()
                    ->route('admin.articles.edit', [
                        'id' => $id
                    ])
                    ->withInput();
            }
        }
		
		$article->update($request->all());

        Cache::tags(['articles', 'list'])
            ->flush();
		
		return redirect()
			->route('admin.articles.index');
	}

    /**
     * Method for article deleting.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
