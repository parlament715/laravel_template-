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

    public function withFacilities(): self
    {   $rand_int = rand(0,5);
        if ($rand_int) {
            return $this->afterCreating(function (Table $table) {
                $facilities = Facility::query()->inRandomOrder()->limit(rand(0, 5))->get();

                $table->facilities()->attach($facilities);
                });
            }
        return $this;
        }
    }
