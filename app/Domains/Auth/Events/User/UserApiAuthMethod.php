<?php

namespace App\Domains\Auth\Events\User;

use App\Domains\Auth\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserDeleted.
 */
class UserApiAuthMethod
{
    use SerializesModels;

    /**
     * @param User $user
     */
    public function __construct(public User $user, public $email_template_type = 0)
    {
    }
}
