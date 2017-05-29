<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register()
	{
		return view('layouts.double', [
			'page' => 'pages.client.registrationPage',
		]);
	}
	
	
	public function registerPost(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200|min:2',
			'email' => 'required|email|unique:users|max:200',
			'password' => 'required|max:200|min:6',
			'password2' => 'required|same:password',
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
			'page' => 'pages.client.loginPage',
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
				->route('public.auth.login')
				->with('authError', trans('custom.wrong_password'));
		}
	}
	
	
	public function logout()
	{
		Auth::logout();
		
		return redirect()->route('public.articles.index');
	}
}