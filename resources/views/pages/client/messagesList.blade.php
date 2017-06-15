@section('main_column')
	<a href="{{ route('public.guestbook.add') }}"><strong>Написать сообщение</strong></a><br><br>
	@forelse ($messages as $message)
		<li>{{ $message->created_at }}<br><strong>{{ $message->name }}</strong><br>{{ $message->text }}</li><br>
	@empty
		<strong>Messages not found</strong>
	@endforelse

	{{ $messages->links()  }}
	
@endsection