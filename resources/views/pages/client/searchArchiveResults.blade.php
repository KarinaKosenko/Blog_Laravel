@section('main_column')
	
	@forelse ($articles as $article)
		<li><a href="{{ route('public.articles.one', ['id' => $article->id]) }}">{{ $article->title }}</a></li>
	@empty
		<strong>Статей найдено: 0. Пожалуйста, выберите другой период времени.</strong><br>
		<a href="{{ route('public.archives.search') }}"><strong>Искать далее...</strong></a>
	@endforelse
	
@endsection