<?php

namespace Database\Factories;

use App\Models\Days_info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Days_InfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Days_info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $info = [
            'PHPStorm' => random_int(0,10) + (10/random_int(1,9)),
            'Spotify' => random_int(0,10) + (10/random_int(1,9)),
            'Google Chrome' => random_int(0,10) + (10/random_int(1,9)),
            'SQL Manager' => random_int(0,10) + (10/random_int(1,9)),
            'Dota 2' => random_int(0,10) + (10/random_int(1,9)),
            'Postman' => random_int(0,10) + (10/random_int(1,9))
        ];

        return [
            'info' => json_encode($info)
        ];
    }
}
