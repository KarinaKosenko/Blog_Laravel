<?php

namespace App\Policies;

use App\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy extends BasePolicy
{
    use HandlesAuthorization;

    const EDIT_COMMENT_PRIV = 'to_edit_blog_comments';
    const DELETE_COMMENT_PRIV = 'to_delete_blog_comments';

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $this->privilege->contains(self::EDIT_COMMENT_PRIV) || ($comment->user->id == $user->id);
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $this->privilege->contains(self::DELETE_COMMENT_PRIV) || ($comment->user->id == $user->id);
    }
}
