<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaterBill>
 */
class WaterBillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'bill_amount' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['paid', 'unpaid']),
        ];
    }
}
