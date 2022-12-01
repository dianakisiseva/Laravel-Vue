<?php
namespace App\Http\Controllers;

use App\Http\BLL\TaskBLLInterface;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

/**
 * @property TaskBLLInterface $taskBLL
 */
class TaskController extends Controller
{

    public function __construct(TaskBLLInterface $taskBLL)
    {
        $this->taskBLL = $taskBLL;
    }

    public function index()
    {
        $tasks = $this->taskBLL->getTasks(Auth::user());

        return response()->json($tasks);
    }


    public function store(CreateTaskRequest $request)
    {
        $task = $this->taskBLL->storeTask($request);

        return response()->json(['task' => $task]);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }


    public function update(EditTaskRequest $request, Task $task)
    {
       $this->taskBLL->updateTask($request, $task);

       return response()->json(['task' => $task]);
    }


    public function destroy(Task $task)
    {
        $task->delete();
    }
}
