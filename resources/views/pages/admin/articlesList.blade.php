@section('main_column')
	
	@forelse ($articles as $article)
		<li><a href="{{ route('admin.articles.one', ['id' => $article->id]) }}">{{ $article->title }}</a></li>
	@empty
		<strong>Articles not found</strong>
	@endforelse
	
@endsection