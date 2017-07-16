<form enctype="multipart/form-data" method="post">
	{{ csrf_field() }}
	
	<strong>Заголовок:</strong><br>
	<input type="text" name="title" value="{{ $article->title or old('title') }}"><br>
	@if ($errors->has('title'))
		<div class="warning_message">
			<strong> {{ $errors->first('title') }} </strong>
		</div>
	@endif

	<br><strong>Содержание:</strong><br>
	<textarea name="content">{{ $article->content or old('content') }}</textarea><br>
	@if ($errors->has('content'))
		<div class="warning_message">
			<strong> {{ $errors->first('content') }} </strong>
		</div>
	@endif

	<br><strong>Загрузите изображение:</strong><br>
	<input type="file" name="file"/><br>
    @if ($fileError)
        <div class="warning_message">
            <strong> {{ $fileError }} </strong>
        </div>
    @endif

	<br><input type="submit" value="Сохранить">
</form>
<br>