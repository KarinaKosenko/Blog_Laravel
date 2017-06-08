<form method="post">
	{{ csrf_field() }}
	
	Имя:<br>
	<input type="text" name="name" value="{{ $message->name or old('name') }}"><br>
	@if ($errors->has('name'))
		<div class="warning_message">
			<strong> {{ $errors->first('name') }} </strong>
		</div>
	@endif
	
	Сообщение:<br>
	<textarea name="text">{{ $message->text or old('text') }}</textarea><br>
	@if ($errors->has('text'))
		<div class="warning_message">
			<strong> {{ $errors->first('text') }} </strong>
		</div>
	@endif
	
	<input type="submit" value="Сохранить">
</form>
<br>
<span>{{ $msg }}</span>