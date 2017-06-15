@section('main_column')
	<strong>Найдено статей: {{ $articles
	->count() }}</strong><br><br>
	@forelse ($articles as $article)
		<li><a href="{{ route('public.articles.one', ['id' => $article->id]) }}">{{ $article->title }}</a></li>
	@empty
		<strong>Пожалуйста, выберите другой период времени.</strong><br>
		<a href="{{ route('public.archives.search') }}"><strong>Искать далее...</strong></a>
	@endforelse
	
@endsection