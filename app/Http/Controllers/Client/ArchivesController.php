<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Article;

/**
 * Class ArchivesController - class for archive of the articles on the client side.
 */
class ArchivesController extends ClientBase
{
    /**
     * Method for archive searching (by month and by year).
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
	{
		if (isset($request->year) && isset($request->month)) {
			$articles = Article::whereBetween('created_at', [
			    "$request->year". "-" . "$request->month" . "-" . "01",
                "$request->year". "-" . "$request->month" . "-" . "31"
            ])->get();
		
			return view('layouts.double', [
				'title' => 'Archive Searching - Result',
				'page' => 'pages.client.searchArchiveResults',
				'articles' => $articles,
				'recent_posts' => $this->recent_posts,
				'menu' => $this->menu,
			]);
		}
		else {
			return view('layouts.double', [
				'title' => 'Archive Searching',
				'page' => 'pages.client.searchArchiveRequest',
				'recent_posts' => $this->recent_posts,
				'menu' => $this->menu,
                'msg' => 'Пожалуйста, выберите период.',
			]);
		}
	}
}
