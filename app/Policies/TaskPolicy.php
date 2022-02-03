<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function updateTask(User $user, Task $task)
    {
        return $user->id == $task->user_id;
    }

    public function deleteTask(User $user, Task $task)
    {
        return $user->id == $task->user_id;
    }
}
