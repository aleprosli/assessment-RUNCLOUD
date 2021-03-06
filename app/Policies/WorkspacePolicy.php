<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkspacePolicy
{
    use HandlesAuthorization;

    public function showWorkspace(User $user, Workspace $workspace)
    {
        return $user->id == $workspace->user_id;
    }

    public function deleteWorkspace(User $user, Workspace $workspace)
    {
        return $user->id == $workspace->user_id;
    }
}
