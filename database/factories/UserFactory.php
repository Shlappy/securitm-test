<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2a$12$UKwba.OWCuHKOiYKIJhkGeUd5lkCWvWu0mBdpey18i7d2N/MFx6ma', // Пароль - 1234
            'ip' => fake()->ipv4(),
            'comment' => fake()->sentence(4)
        ];
    }
}
