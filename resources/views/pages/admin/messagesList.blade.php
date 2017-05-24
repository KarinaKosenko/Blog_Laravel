@extends('base')

@section('main_column')
	<a href="/admin/guestbook/add"><strong>Написать сообщение</strong></a><br><br>
	@forelse ($messages as $message)
		<li>{{ $message['date'] }}<br><strong>{{ $message['author'] }}</strong><br>{{ $message['text'] }}
		<br>
		<a href="/admin/guestbook/edit/{{ $id }}">Редактировать</a><br>
		<a href="/admin/guestbook/delete/{{ $id }}">Удалить</a>
		</li>
	@empty
		<strong>Messages not found</strong>
	@endforelse
	
@endsection