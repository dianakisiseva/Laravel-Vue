<?php

namespace App\Http\Providers;

use App\Http\BLL\TaskBLL;
use App\Http\BLL\TaskBLLInterface;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(TaskBLLInterface::class, TaskBLL::class);
    }
}
