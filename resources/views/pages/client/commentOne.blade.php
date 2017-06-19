<li>
    <div class="comment">
        <div class="author">
            <strong>{{ $comment['author'] }}</strong>
            <span class="date">{{ $comment['created_at'] }}</span>
        </div>
        <div class="comment_text">{{ $comment['text']}}</div>
        <a href = "{{ route('public.comments.add', ['article_id' => $article_id, 'parent_id' => $comment['id']]) }}">Ответить</a><br><hr>
    </div>

    @if(isset($comment['children']))
        <ul>
            {!!  App()->make('commentsHelper')->getComments($comment['children'], $article_id) !!}
        </ul>
    @endif
</li>
