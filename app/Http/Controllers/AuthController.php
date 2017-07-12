<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Article;
use App\Models\Menu;


class AuthController extends Controller
{
    public $recent_posts;
	protected $menu;
	
	public function __construct()
	{
        $this->menu = Cache::tags(['menu', 'public'])
            ->remember('menu', env('CACHE_TIME', 0), function () {
                return Menu::where('panel_name', 'public')
                    ->get();
            });

        $this->recent_posts = Cache::tags(['articles', 'recent'])
            ->remember('articles', env('CACHE_TIME', 0), function () {
                return Article::recent(3);
            });
	}
	
	
	public function register()
	{
		return view('layouts.double', [
			'title' => 'Registration',
			'page' => 'pages.client.registrationPage',
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}
	
	
	public function registerPost(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200|min:2',
			'email' => 'required|email|unique:users|max:200',
			'password' => 'required|max:200|min:6',
			'password2' => 'required|same:password',
            'captcha' => 'required|captcha',
			'is_confirmed' => 'accepted'
		]);
		
		
		DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'created_at' => Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
        ]);
		
		return redirect()
			->route('public.articles.index');
	}
	
	
	public function login()
	{
	    return view('layouts.double', [
			'title' => 'Log In',
			'page' => 'pages.client.loginPage',
			'recent_posts' => $this->recent_posts,
			'menu' => $this->menu,
		]);
	}
	
	
	public function loginPost(Request $request)
	{
		$remember = $request->input('remember') ? true : false;
		
		$authResult = Auth::attempt([
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		], $remember);
		
		if ($authResult) {
			return redirect()->route('public.articles.index');
		} 
		else {
			return redirect()
				->route('login')
				->with('authError', trans('custom.wrong_password'));
		}
	}
	
	
	public function loginAdminPost(Request $request)
	{
		$remember = $request->input('remember') ? true : false;
		
		$authResult = Auth::attempt([
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		], $remember);
		
		if ($authResult && Auth::user()->isAdmin()) {
            return redirect()->route('admin.articles.index');
		} 
		else {
			return redirect()
				->route('admin.auth.login')
				->with('authError', trans('custom.wrong_password'));
		}
	}
	
	
	public function logout()
	{
		Auth::logout();
		return redirect()->route('public.articles.index');
	}
}