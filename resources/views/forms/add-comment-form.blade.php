<form method="post">
	{{ csrf_field() }}

	Сообщение:<br>
	<textarea name="text">{{ $comment->text or old('text') }}</textarea><br>
	@if ($errors->has('text'))
		<div class="warning_message">
			<strong> {{ $errors->first('text') }} </strong>
		</div>
	@endif
	
	<input type="submit" value="Отправить">
</form>
<br>