<?php

namespace App\Domains\Auth\Events\User;

use App\Domains\Auth\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserDeleted.
 */
class UserDeletedApi
{
    use SerializesModels;

    /**
     * @param $user
     */
    public function __construct(public User $user)
    {
    }
}
