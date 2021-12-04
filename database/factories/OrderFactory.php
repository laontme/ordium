<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->sentence(200),
            "issuer_id" => User::get()->random()->id,
            "assigned_id" => User::get()->random()->id,
            "completed" => rand(0,1) == 1
        ];
    }
}
