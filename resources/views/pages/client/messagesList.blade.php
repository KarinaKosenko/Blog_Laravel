@section('main_column')
	<a href="{{ route('public.guestbook.add') }}"><strong>Написать сообщение</strong></a><br><br>
	@forelse ($messages as $message)
		<li>
            {{ $message->created_at }}<br><strong>{{ $message->name }}</strong><br>{{ $message->text }}

            @can('update', \App\Models\Message::class)
                <br><a href="{{ route('public.guestbook.edit', ['id' => $message->id]) }}">Редактировать</a>
            @endcan

            @can('delete', \App\Models\Message::class)
                <br><a href="{{ route('public.guestbook.delete', ['id' => $message->id]) }}">Удалить</a><br>
            @endcan
        </li>
        <br>


	@empty
		<strong>Messages not found</strong>
	@endforelse

	{{ $messages->links()  }}
	
@endsection