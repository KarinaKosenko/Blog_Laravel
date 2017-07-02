<form method="post">
    {{ csrf_field() }}

    Имя: <br>
    <input type="text" name="name" value="{{ old('name') }}"><br>
    @if ($errors->has('name'))
        <div class="warning_message">
            <strong> {{ $errors->first('name') }} </strong>
        </div>
    @endif
    <br>

    E-mail: <br>
    <input type="text" name="email" value="{{ old('email') }}"><br>
    @if ($errors->has('email'))
        <div class="warning_message">
            <strong> {{ $errors->first('email') }} </strong><br>
        </div>
    @endif
    <br>

    Сообщение:<br>
    <textarea name="text">{{ $comment->text or old('text') }}</textarea><br>
    @if ($errors->has('text'))
        <div class="warning_message">
            <strong> {{ $errors->first('text') }} </strong>
        </div>
    @endif
    <br>

    <input type="submit" value="Отправить">
</form>