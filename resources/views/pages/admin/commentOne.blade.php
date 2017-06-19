<li>
    <div class="comment">
        <div class="author">
            <strong>{{ $comment['author'] }}</strong>
            <span class="date">{{ $comment['created_at'] }}</span>
        </div>
        <div class="comment_text">{{ $comment['text']}}</div><br>

        @if($comment['text'] !== 'Комментарий удален.')
            <a href = "{{ route('admin.comments.add', ['article_id' => $article_id, 'parent_id' => $comment['id']]) }}">Ответить</a><br>
            <a href = "{{ route('admin.comments.edit', ['article_id' => $article_id, 'id' => $comment['id']]) }}">Редактировать</a><br>
            <a href = "{{ route('admin.comments.delete', ['article_id' => $article_id, 'id' => $comment['id']]) }}">Удалить</a><br><hr>
        @endif
    </div>

    @if(isset($comment['children']))
        <ul>
            {!!  App()->make('commentsHelper')->getComments($comment['children'], $article_id, 'admin') !!}
        </ul>
    @endif
</li>
