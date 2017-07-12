<form method="post">
	{{ csrf_field() }}
	
	Имя: *<br>
	<input type="text" name="name" value="{{ old('name') }}"><br>
	@if ($errors->has('name'))
		<div class="warning_message">
			<strong> {{ $errors->first('name') }} </strong>
		</div>
	@endif
	<br>
	
	E-mail: *<br>
	<input type="text" name="email" value="{{ old('email') }}"><br>
	@if ($errors->has('email'))
		<div class="warning_message">
			<strong> {{ $errors->first('email') }} </strong><br>
		</div>
	@endif
	<br>
	
	Пароль: *<br>
	<input type="password" name="password"><br>
	@if ($errors->has('password'))
		<div class="warning_message">
			<strong> {{ $errors->first('password') }} </strong><br>
		</div>
	@endif
	<br>
	
	Повторите пароль: *<br>
	<input type="password" name="password2"><br>
	@if ($errors->has('password2'))
		<div class="warning_message">
			<strong> {{ $errors->first('password2') }} </strong><br>
		</div>
	@endif
	<br>

	Введите код с изображения: *<br>
	{!!  captcha_img() !!}<br>
	<input type="text" name="captcha"><br>
	@if ($errors->has('captcha'))
		<div class="warning_message">
			<strong> {{ $errors->first('captcha') }} </strong>
		</div>
	@endif
	<br>

	<input type="checkbox" name="is_confirmed">Принять правила сайта<br>
	@if ($errors->has('is_confirmed'))
		<div class="warning_message">
			<strong> {{ $errors->first('is_confirmed') }} </strong><br>
		</div>
	@endif
	<br>
	
	<input type="submit" value="Отправить">
</form>