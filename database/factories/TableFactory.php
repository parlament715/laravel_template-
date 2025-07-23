<?php

namespace Database\Factories;

use App\Models\Facility;
use App\Models\Table;
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
            "type" => $this->faker->numberBetween(0, 2),
            "seats_max" => $this->faker->numberBetween(2, 8),
            "branch_id" => Branch::factory(),

        ];
    }

    public function forBranch(Branch $branch = null): self
    {
        $branch = match (true) {
            $branch !== null => $branch,
            Branch::query()->exists() => Branch::query()->inRandomOrder()->first(),
            default => Branch::factory()
        };

        return $this->for($branch);
    }


    public function withFacilities(): self
    {
        return $this->afterCreating(function (Table $table) {
            if (Facility::query()->exists()) {
                return Facility::query()->inRandomOrder()->limit(rand(1, 5))->get();
            }
            return Facility::factory()->count(rand(1, 5))->create();
        });


    }

}
