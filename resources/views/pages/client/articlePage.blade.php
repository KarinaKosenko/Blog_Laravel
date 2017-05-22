@extends('base')

@section('main_column')
	<div class="post_box">
		<h2>{{ $article['title'] }}</h2>
		<div class="post_body">
			{!! $article['content'] !!}
		</div>     
	</div>
@endsection