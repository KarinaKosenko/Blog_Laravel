@section('main_column')
	<a href="{{ route('admin.guestbook.add') }}"><strong>Написать сообщение</strong></a><br><br>
	@forelse ($messages as $message)
		<li>{{ $message->created_at }}<br><strong>{{ $message->name }}</strong><br>{{ $message->text }}
		<br>
		<a href="{{ route('admin.guestbook.edit', ['id' => $message->id]) }}">Редактировать</a><br>
		<a href="{{ route('admin.guestbook.delete', ['id' => $message->id]) }}">Удалить</a>
		</li>
		<br>
	@empty
		<strong>Messages not found</strong>
	@endforelse

	{{ $messages->links()  }}
	
@endsection