<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy extends BasePolicy
{
    use HandlesAuthorization;

    const EDIT_MESSAGE_PRIV = 'to_edit_guestbook_messages';
    const DELETE_MESSAGE_PRIV = 'to_delete_guestbook_messages';

    /**
     * Determine whether the user can update the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->privilege->contains(self::EDIT_MESSAGE_PRIV);
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->privilege->contains(self::DELETE_MESSAGE_PRIV);
    }
}
