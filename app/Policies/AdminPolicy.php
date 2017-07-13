<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App/User;

use App/NnAuthGroupAccess;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, NnAuthGroupAccess $access)
    {
        return $user->id == $access->uid;
    }

    public function delete(User $user, NnAuthGroupAccess $access)
    {
        return $user->id == $access->uid;
    }
}
