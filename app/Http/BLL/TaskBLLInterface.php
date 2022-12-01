<?php

namespace App\Http\BLL;

interface TaskBLLInterface
{
    public function getTasks($user);

    public function storeTask($request);

    public function updateTask($request, $task);
}
