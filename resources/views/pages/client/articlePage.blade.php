@section('main_column')
	<div class="post_box">
		<h2>{{ $article->title }}</h2>
		<div class="post_info">

            <div class="post_date">
                {{ substrDate($article->created_at) }}
          </div>

            <div class="post_author">
                <span>{{ $article->author }}</span>
            </div>

            <div class="post_comment">
                <span>{{ $article->comments->count() }} comments</span>
            </div>

            <div class="cleaner"></div>
        </div>
		
		<div class="post_body">
			{!! $article->content !!}
		</div>     
	</div>

	@if (Auth::check())
		<a href="{{ route('public.comments.add', ['article_id' => $article->id]) }}"><strong>Добавить комментарий</strong></a><br><br>
	@else
		Для того, чтобы добавить комментарий, <a href="{{ route('login') }}"><strong>войдите</strong></a> или
		<a href="{{ route('public.auth.register') }}"><strong>зарегистрируйтесь</strong></a>.<br><br>
	@endif

	@forelse ($comments as $comment)
		<li><strong>{{ $comment->author }}</strong><br>{{ $comment->created_at }}<br>{{ $comment->text }}</li><br>
	@empty
		<strong>К этой статье комментариев пока нет.</strong><br>
	@endforelse

@endsection