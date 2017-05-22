@extends('base')

@section('main_column')
	<form method="post">
		Заголовок:<br>
		<input type="text" name="title" value="{{ $title or '' }}"><br>
		Содержание:<br>
		<textarea name="content">{{ $content or ''}}</textarea><br>
		<input type="submit" value="Сохранить">
	</form>
	<br>
	<span>{{ $msg or 'some message'}}</span>
@endsection