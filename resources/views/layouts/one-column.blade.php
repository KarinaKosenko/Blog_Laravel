@extends('layouts.base')

@section('header')
	@include('blocks.header')
@endsection

@section('menu')
	@include('blocks.menu')
@endsection

@section('content')
	<div id="main_column">
		@yield('main_column')
	</div>
@endsection

@section('footer_links')
	@include('blocks.footer_links')
@endsection

@section('footer_copyrights')
	@include('blocks.footer_copyright')
@endsection