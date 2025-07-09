<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Branch;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "table_number" => $this->faker->numberBetween(1, 100),
            "status" => $this->faker->numberBetween(0, 2),
            "number_of_seats" => $this->faker->numberBetween(2, 8),
            "branch_id" => Branch::factory(),

        ];
    }
}
