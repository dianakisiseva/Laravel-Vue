<?php

namespace Database\Seeders;

use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);

        Task::factory(10)->has(
            Subtask::factory(rand(1,10))
        )->create();

    }
}
