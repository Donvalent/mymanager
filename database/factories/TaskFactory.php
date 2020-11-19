<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [
            'Выполнено',
            'В работе',
            'Не выполнено',
        ];

        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->title(),
            'date' => $this->faker->date(),
            'deadline' => $this->faker->dateTimeThisMonth(),
            'status' => array_rand($status)
        ];
    }
}
