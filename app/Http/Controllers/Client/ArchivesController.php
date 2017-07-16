<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Article;

class ArchivesController extends ClientBase
{
	public function search(Request $request)
	{
		if(isset($request->year) && isset($request->month)) {
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
