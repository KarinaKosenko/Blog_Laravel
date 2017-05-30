<form method="post">
	Заголовок:<br>
	<input type="text" name="title" value="{{ $article_title or '' }}"><br>
	Содержание:<br>
	<textarea name="content">{{ $content or ''}}</textarea><br>
	<input type="submit" value="Сохранить">
</form>
<br>
<span>{{ $msg or 'some message'}}</span>