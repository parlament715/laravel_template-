<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;
use Database\Seeders\FacilitySeeder;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{

    public function run(): void
    {
        $branches = Branch::all();
        foreach ($branches->pluck("id") as $branch_id) {
            for ($i = 1, $n = rand(5, 20); $i < $n; $i++) {
                Table::factory()->create([
                    "branch_id" => $branch_id,
                    "table_number" => $i,
                ]);
            }
        }

    }
}
