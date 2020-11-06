<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    public $positions = [
        'Senior Backend developer',
        'Middle Backend developer',
        'Junior Backend developer',
        'Intern Backend developer',

        'Senior Frontend developer',
        'Middle Frontend developer',
        'Junior Frontend developer',
        'Intern Frontend developer',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->positions[array_rand($this->positions)],
            'salary' => mt_rand(25000, 120000),
        ];
    }
}
