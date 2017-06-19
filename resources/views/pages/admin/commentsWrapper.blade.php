<a href="{{ route('admin.comments.add', ['article_id' => $article->id]) }}"><strong>Добавить комментарий</strong></a><br><br>

<div class="comments_wrap">
    <ul>
        {!! $comments !!}
    </ul>
</div>