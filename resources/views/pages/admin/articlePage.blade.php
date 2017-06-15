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
		<a href="{{ route('admin.articles.edit', ['article_id' => $article->id]) }}">Редактировать</a><br>
		<a href="{{ route('admin.articles.delete', ['article_id' => $article->id]) }}">Удалить</a>
	</div>

	<a href="{{ route('admin.comments.add', ['article_id' => $article->id]) }}"><strong>Добавить комментарий</strong></a><br><br>

	@forelse ($comments as $comment)
		<li><strong>{{ $comment->author }}</strong><br>{{ $comment->created_at }}<br>{{ $comment->text }}</li>
		<a href="{{ route('admin.comments.edit', ['article_id' => $article->id, 'comment_id' => $comment->id]) }}">Редактировать</a><br>
		<a href="{{ route('admin.comments.delete', ['article_id' => $article->id, 'comment_id' => $comment->id]) }}">Удалить</a><br><br>
	@empty
		<strong>К этой статье комментариев пока нет.</strong>
	@endforelse
		
@endsection