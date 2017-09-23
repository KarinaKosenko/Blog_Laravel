<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class MessagePolicy - determine whether the user can work with guest book messages.
 */
class MessagePolicy extends BasePolicy
{
    use HandlesAuthorization;

    const EDIT_MESSAGE_PRIV = 'to_edit_guestbook_messages';
    const DELETE_MESSAGE_PRIV = 'to_delete_guestbook_messages';

    /**
     * Determine whether the user can update the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->privilege->contains(self::EDIT_MESSAGE_PRIV);
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->privilege->contains(self::DELETE_MESSAGE_PRIV);
    }
}
