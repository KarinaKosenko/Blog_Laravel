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

	{!! $comments !!}
		
@endsection