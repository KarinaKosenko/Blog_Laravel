<header>
	@if (Auth::check())
		<li>
			Вы вошли как {{ Auth::user()->name }}<br><a href="{{ route('public.auth.logout') }}">Выход</a>
		</li>
	@else
		<ul>
			<li><a href="{{ route('login') }}">Вход</a></li>
			<li><a href="{{ route('public.auth.register') }}">Регистрация</a></li>
		</ul>
	@endif
	
	<div id="templatemo_site_title_bar_wrapper">
		<div id="templatemo_site_title_bar">
			<div id="site_title">
				<h1><a href="{{ route('public.articles.index') }}" target="_parent">Персональный блог
					<span>ФИО</span>
				</a></h1>
			</div>
			
		@include('blocks.search_panel')	
		
		</div>
	</div>	
</header>