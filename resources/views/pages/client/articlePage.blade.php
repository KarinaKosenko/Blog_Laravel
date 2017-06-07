@section('main_column')
	<div class="post_box">
		<h2>{{ $article->title }}</h2>
		<div class="post_info">

            <div class="post_date">
                {{ substrDate($article->created_at) }}
          </div>

            <div class="post_author">
                <a href="#">{{ $article->author }}</a>
            </div>

            <div class="post_comment">
                <a href="#">184 comments</a>
            </div>

            <div class="cleaner"></div>
        </div>
		
		<div class="post_body">
			{!! $article->content !!}
		</div>     
	</div>
@endsection