<?php

namespace App\Http\Policies;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return boolean
     */
    public function index(User $user)
    {
        return $user->role_id == Role::ADMIN ||
            $user->role_id == Role::USER;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return boolean
     */
    public function view(User $user, Task $task)
    {
        return $user->role_id == Role::ADMIN ||
            $task->user_id == auth()->user()->id;

    }

    /**
     * Determine whether the user can create models.
     *
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->role_id == Role::ADMIN ||
            $user->role_id == Role::USER;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return boolean
     */
    public function update(User $user, Task $task)
    {
        return $user->role_id == Role::ADMIN ||
            $task->user_id == auth()->user()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return boolean
     */
    public function delete(User $user, Task $task)
    {
        return $user->role_id == Role::ADMIN ||
            $task->user_id == auth()->user()->id;
    }
}
