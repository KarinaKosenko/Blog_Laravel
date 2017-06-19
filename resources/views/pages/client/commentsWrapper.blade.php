@if (Auth::check())
    <a href="{{ route('public.comments.add', ['article_id' => $article->id]) }}"><strong>Добавить комментарий</strong></a><br><br>
@else
    Для того, чтобы добавить комментарий, <a href="{{ route('login') }}"><strong>войдите</strong></a> или
    <a href="{{ route('public.auth.register') }}"><strong>зарегистрируйтесь</strong></a>.<br><br>
@endif

<div class="comments_wrap">
    <ul>
        {!! $comments !!}
    </ul>
</div>
