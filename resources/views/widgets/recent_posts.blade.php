<div class="side_column_section">
	<h3>Свежие статьи</h3>
					
	@foreach ($recent_posts as $post)
		<div class="recent_post">
			<h4><a href="{{ route('public.articles.one', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
			<p>{{ substrContent($post->content) }}</p>
		</div>
	@endforeach          
</div>

<div class="cleaner_h30">&nbsp;</div>