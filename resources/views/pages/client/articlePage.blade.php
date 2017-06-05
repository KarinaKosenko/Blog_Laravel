@section('main_column')
	<div class="post_box">
		<h2>{{ $article->title }}</h2>
		<span>Автор: {{ $article->author }}</span><br>
		<span>Добавлена: {{ $article->created_at }}</span>
		<div class="post_body">
			{!! $article->content !!}
		</div>     
	</div>
@endsection