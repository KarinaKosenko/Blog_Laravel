<form method="post">
	{{ csrf_field() }}
	
	Имя: *<br>
	<input type="text" name="name" value="{{ $name or ''}}"><br>
	@if ($errors->has('name'))
		<strong>{{ $errors->first('name') }} </strong><br>
	@endif
	<br>
	
	E-mail: *<br>
	<input type="text" name="email" value="{{ $email or ''}}"><br>
	@if ($errors->has('email'))
		<strong>{{ $errors->first('email') }} </strong><br>
	@endif
	<br>
	
	Пароль: *<br>
	<input type="password" name="password"><br>
	@if ($errors->has('password'))
		<strong>{{ $errors->first('password') }} </strong><br>
	@endif
	<br>
	
	Повторите пароль: *<br>
	<input type="password" name="password2"><br>
	@if ($errors->has('password2'))
		<strong>{{ $errors->first('password2') }} </strong><br>
	@endif
	<br>
	
	<input type="checkbox" name="is_confirmed">Принять правила сайта<br>
	@if ($errors->has('is_confirmed'))
		<strong>{{ $errors->first('is_confirmed') }} </strong><br>
	@endif
	<br>
	
	<input type="submit" value="Отправить">
</form>