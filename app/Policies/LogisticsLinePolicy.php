<?php

namespace App\Policies;

use App\Models\LogisticsLine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogisticsLinePolicy
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

    public function own(User $user, LogisticsLine $logisticsLine)
    {
        return $user->id == $logisticsLine->user_id;
    }
}
