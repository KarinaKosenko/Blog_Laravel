@section('main_column')
	<a href="/guestbook/add"><strong>Написать сообщение</strong></a><br><br>
	@forelse ($messages as $message)
		<li>{{ $message['date'] }}<br><strong>{{ $message['author'] }}</strong><br>{{ $message['text'] }}</li>
	@empty
		<strong>Messages not found</strong>
	@endforelse
	
@endsection