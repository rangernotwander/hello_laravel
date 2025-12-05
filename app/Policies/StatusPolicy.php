<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Status;
use Illuminate\Auth\Access\Response;

class StatusPolicy
{
    /**
     * Determine whether the user can delete the status.
     */
    public function destroy(User $user, Status $status): bool
    {
        return $user->id === $status->user_id;
    }
}
