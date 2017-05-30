@extends('layouts.two-columns')

@section('main_column')
	@include($page)
@endsection

@section('side_column')
	@include('widgets.banners')
	@include('widgets.archives')
	@include('widgets.recent_posts')
@endsection