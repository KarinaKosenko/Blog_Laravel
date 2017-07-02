@section('main_column')
	
	@forelse ($articles as $article)
		<li>
			<a href="{{ route('public.articles.one', ['id' => $article->id]) }}">{{ $article->title }}</a><br>
            <strong>Добавлена:</strong> {{ substrDate($article->created_at) }}<br>
            <strong>Автор:</strong> {{ $article->user->name }}<br><br>
        </li>
	@empty
		<strong>Articles not found</strong>
	@endforelse

	{{ $articles->links() }}
	
@endsection