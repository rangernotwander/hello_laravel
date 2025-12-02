<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * 用户只能查看自己的资料
     */
    public function view(User $currentUser, User $user): bool
    {
        return $currentUser->id === $user->id;
    }

    /**
     * 用户只能编辑自己的资料
     */
    public function update(User $currentUser, User $user): bool
    {
        return $currentUser->id === $user->id;
    }


    public function destroy(User $currentUser, User $user): bool
    {
        // 管理员且不能删自己
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
