@if ($authStatus)
    <a href="{{ route('public.comments.add', ['article_id' => $article->id]) }}"><strong>Добавить комментарий</strong></a><br><br>
@else
    Для того, чтобы добавить комментарий, <a href="{{ route('login') }}"><strong>войдите</strong></a> или
    <a href="{{ route('public.auth.register') }}"><strong>зарегистрируйтесь</strong></a>.<br><br>
@endif

<div class="comments_wrap">
    <ul>
        @foreach($comments as $comment)
            <li>
                <div class="comment">
                    <strong>{{ $comment->user->name }}</strong><br>
                    {{ $comment->created_at }}<br>
                    {{ $comment->text }}<br>

                    @if($authStatus && $comment->text !== 'Комментарий удален.')
                        <a href = "{{ route('public.comments.add', [
                            'article_id' => $article->id,
                            'parent_id' => $comment->id
                        ]) }}">Ответить</a><br>

                        @can('update', $comment)
                            <a href = "{{ route('public.comments.edit', [
                                'article_id' => $article->id,
                                'id_comment' => $comment->id
                            ]) }}">Редактировать</a><br>
                        @endcan

                        @can('delete', $comment)
                            <a href = "{{ route('public.comments.delete', [
                                'article_id' => $article->id,
                                'comment_id' => $comment->id
                            ]) }}">Удалить</a><br>
                        @endcan
                    @endif

                </div>
                <hr>

                @if(count($comment->childs))
                    @include('pages.client.commentOne',[
                        'authStatus' => $authStatus,
                        'childs' => $comment->childs,
                        'article' => $article])
                @endif
            </li>
        @endforeach
    </ul>
</div>
