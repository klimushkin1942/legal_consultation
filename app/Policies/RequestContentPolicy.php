<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestContentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function canGetAllClientRequests(User $user)
    {
        return $user->role_id === User::CLIENT;
    }

    public function canGetAllLawyerRequests(User $user)
    {
        return $user->role_id === User::LAWYER;
    }

    public function canLawyerUpdateRequests(User $user)
    {
        return $user->role_id === User::LAWYER;
    }

    public function canClientUpdateRequests(User $user)
    {
        return $user->role_id === User::CLIENT;
    }
}
