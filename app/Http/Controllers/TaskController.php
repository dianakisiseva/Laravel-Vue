<?php
namespace App\Http\Controllers;

use App\Http\BLL\TaskBLLInterface;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\SubTask;
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

    public function getTasksByEmail()
    {
        $tasks = $this->taskBLL->getTasksByEmail(request()->email);

        return response()->json(['tasks' => $tasks]);
    }

    //implementation for checking Subtasks of all tasks
    public function checkSubtasksOfAllTasks()
    {
        $tasks = $this->taskBLL->getAllTasks();
        foreach ($tasks as $task) {
            if ($task->subtasks()->where('status', true)->count() == $task->subtasks()->count()) {
                $task->update(['status' => Task::COMPLETED]);
            }
        }
    }

//    implementation with subtask_id sent from front-end, changing the status to true and checking if all
//    others subtasks are true, then make parent task completed
    public function checkLastSubtaskOfOneTask()
    {
        $subTaskId = request()->subtask_id;

        $subTask = SubTask::where('id', $subTaskId)->first();

        $subTask->update(['status' => true]);

        $task = $subTask->task->load('subtasks');

        if ($task->subtasks()->where('status', true)->count() == $task->subtasks()->count()) {
            $task->update(['status' => Task::COMPLETED]);
        }
    }

}
