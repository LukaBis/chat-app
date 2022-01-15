<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_from_id' => User::randomId(),
            'user_to_id' => User::randomId(),
            'text' => $this->faker->sentence(),
            'image' => null
        ];
    }
}
