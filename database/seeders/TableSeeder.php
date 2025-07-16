<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;
use App\Models\Facility;
use App\Models\Branch;

class TableSeeder extends Seeder
{

    public function run(): void
    {
        foreach (Branch::all() as $branch) {
            if ($branch->table()->count() == 0) {
                for ($i = 1, $n = rand(20, 50); $i < $n; $i++) {
                    Table::factory()->afterCreating(
                        function (Table $table){
                            $facilities = Facility::inRandomOrder()
                                ->take(rand(0,5))->pluck("id");
                            $table->facility()->attach($facilities);
                            $table->save();
                        }
                    )->create([
                        "branch_id" => $branch->id,
                        "table_number" => $i,
                    ]);
                }
            }
        }
    }
}
