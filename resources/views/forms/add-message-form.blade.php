<form method="post">
	Имя:<br>
	<input type="text" name="name" value="{{ $name or '' }}"><br>
	Сообщение:<br>
	<textarea name="text">{{ $text or ''}}</textarea><br>
	<input type="submit" value="Сохранить">
</form>
<br>
<span>{{ $msg or 'some message'}}</span>