<li>
    <ul>
        @foreach($childs as $child)
            <li>
                <div class="comment">
                    <strong>{{ $child->user->name }}</strong><br>
                    {{ $child->created_at }}<br>
                    {{ $child->text }}<br>

                    @if($authStatus && $child->text !== 'Комментарий удален.')
                        <a href = "{{ route('public.comments.add', [
                            'article_id' => $article->id,
                            'parent_id' => $child->id
                        ]) }}">Ответить</a><br>

                        @can('update', $child)
                            <a href = "{{ route('public.comments.edit', [
                                'article_id' => $article->id,
                                'comment_id' => $child->id
                            ]) }}">Редактировать</a><br>
                        @endcan

                        @can('delete', $child)
                            <a href = "{{ route('public.comments.delete', [
                                'article_id' => $article->id,
                                'comment_id' => $child->id
                            ]) }}">Удалить</a><br>
                        @endcan
                    @endif
                </div>
                <hr>
                @if(count($child->childs))
                    @include('pages.client.commentOne',[
                        'authStatus' => $authStatus,
                        'childs' => $child->childs,
                        'article' => $article])
                @endif
            </li>
        @endforeach
    </ul>
</li>
