<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'username' => $this->faker->unique()->userName(),
            'bill_no' => $this->faker->randomNumber(5),
            'created_at' => time(),
            'updated_at' => time(),
            'user_id' => User::factory()->create(['password' => '12345678']),
        ];
    }
}
