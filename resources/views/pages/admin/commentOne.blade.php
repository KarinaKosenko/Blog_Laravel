<li>
    <ul>
        @foreach($childs as $child)
            <li>
                <div class="comment">
                    <strong>{{ $child->user->name }}</strong><br>
                    {{ $child->created_at }}<br>
                    {{ $child->text }}<br>

                    @if($child->text !== 'Комментарий удален.')
                        <a href = "{{ route('admin.comments.add', [
                            'article_id' => $article->id,
                            'parent_id' => $child->id
                        ]) }}">Ответить</a><br>

                        <a href = "{{ route('admin.comments.edit', [
                            'article_id' => $article->id,
                            'comment_id' => $child->id
                        ]) }}">Редактировать</a><br>

                        <a href = "{{ route('admin.comments.delete', [
                            'article_id' => $article->id,
                            'comment_id' => $child->id
                        ]) }}">Удалить</a><br>
                    @endif
                </div>
                <hr>
                @if(count($child->childs))
                    @include('pages.admin.commentOne',[
                        'childs' => $child->childs,
                        'article' => $article])
                @endif
            </li>
        @endforeach
    </ul>
</li>
