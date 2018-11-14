<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if a user can complete a task.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Task $task
     * @return bool
     */
    public function complete(User $user, Task $task)
    {
        return $user->is($task->user);
    }
}
