<a href="{{ route('admin.comments.add', ['article_id' => $article->id]) }}"><strong>Добавить комментарий</strong></a><br><br>

<div class="comments_wrap">
    <ul>
        @foreach($comments as $comment)
            <li>
                <div class="comment">
                    <strong>{{ $comment->user->name }}</strong><br>
                    {{ $comment->created_at }}<br>
                    {{ $comment->text }}<br>

                    @if($comment->text !== 'Комментарий удален.')
                        <a href = "{{ route('admin.comments.add', [
                            'article_id' => $article->id,
                            'parent_id' => $comment->id
                        ]) }}">Ответить</a><br>

                        <a href = "{{ route('admin.comments.edit', [
                            'article_id' => $article->id,
                            'id_comment' => $comment->id
                        ]) }}">Редактировать</a><br>

                        <a href = "{{ route('admin.comments.delete', [
                            'article_id' => $article->id,
                            'comment_id' => $comment->id
                        ]) }}">Удалить</a><br>
                    @endif

                </div>
                <hr>

                @if(count($comment->childs))
                    @include('pages.admin.commentOne',[
                        'childs' => $comment->childs,
                        'article' => $article])
                @endif
            </li>
        @endforeach
    </ul>
</div>