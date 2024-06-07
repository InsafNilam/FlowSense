<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaterBillUnit>
 */
class WaterBillUnitFactory extends Factory
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
            'fixed_charge' => $this->faker->randomFloat(2, 100, 1000),
            'per_unit_charge' => $this->faker->randomFloat(2, 1, 10),
            'min_units' => $this->faker->randomNumber(3),
            'max_units' => $this->faker->randomNumber(3),
        ];
    }
}
