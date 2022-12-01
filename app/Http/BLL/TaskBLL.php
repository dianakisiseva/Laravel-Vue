<?php

namespace App\Http\BLL;

use App\Models\Role;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * @property Task $model
 */
class TaskBLL implements TaskBLLInterface
{
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function getTasks($user)
    {
        if($user && $user->role_id == Role::USER){
            return $this->model->orderBy('expiration_date', 'desc')
                ->where('user_id', $user->id)->get();
        }
        return $this->model->orderBy('expiration_date', 'desc')->get();
    }

    public function storeTask($request)
    {
        return $this->model->create([
            'user_id' => Auth::id() ?? 1,
            'title' => $request->title,
            'expiration_date' => Carbon::now(),
            'description' => $request->description ?? null,
            'status' => Task::OPEN
        ]);
    }

    public function updateTask($request, $task)
    {
        $task->update([
            'title' => $request->title,
            'expiration_date' => Carbon::parse($request->expiration_date)->format('Y-m-d h:m:s'),
            'description' => $request->description ?? null,
        ]);
    }

    public function getTasksByEmail($email)
    {
        return $this->model->leftJoin('users', 'tasks.user_id', 'users.id')
            ->where('users.email', $email)->select('tasks.*')->get();
    }
}
