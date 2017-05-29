@section('main_column')
	
	@forelse ($articles as $article)
		<li><a href="#">{{ $article['title'] }}</a></li>
	@empty
		<strong>Articles not found</strong>
	@endforelse
	
@endsection