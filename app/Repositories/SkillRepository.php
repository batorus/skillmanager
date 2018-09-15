<?php

namespace App\Repositories;

use App\User;

class SkillRepository
{
    /**
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->skills()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}