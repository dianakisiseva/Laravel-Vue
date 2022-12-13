<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->name,
            'user_id' => User::first()->id,
            'expiration_date' => Carbon::now(),
            'status' => Task::OPEN
        ];
    }
}
