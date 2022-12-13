<?php

namespace Database\Factories;

use App\Models\SubTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubTaskFactory extends Factory
{
    protected $model = SubTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'status' => $this->faker->boolean,
        ];
    }
}
