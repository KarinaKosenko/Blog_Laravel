@section('main_column')
	
	@forelse ($articles as $article)
		<li>
			<h3><a href="{{ route('public.articles.one', ['id' => $article->id]) }}">{{ $article->title }}</a></h3>
            <strong>Добавлена:</strong> {{ substrDate($article->created_at) }}<br>
            <strong>Автор:</strong> {{ $article->user->name }}<br>
			<strong>Комментарии:</strong> {{ $article->comments->where('text', '<>', 'Комментарий удален.')->count() }}<br>
			@isset($article->upload)
				<img class="image" src="{{ getImagePath($article->upload->path . '.' . $article->upload->ext) }}" alt="image"><br>
			@endisset
        </li>
		<br>
	@empty
		<strong>Articles not found</strong>
	@endforelse

	{{ $articles->links() }}
	
@endsection