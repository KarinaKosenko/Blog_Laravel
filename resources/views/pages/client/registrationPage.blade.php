@extends('base')

@section('main_column')
	<form method="post">
		Имя: *<br>
		<input type="text" name="name" value="{{ $name or ''}}"><br>
		Логин: *<br>
		<input type="text" name="login" value="{{ $name or ''}}"><br>
		Пароль: *<br>
		<input type="password" name="password"><br>
		Повторите пароль: *<br>
		<input type="password" name="repeat_password"><br>
		<input type="submit" value="Отправить">
	</form>
@endsection
	
	