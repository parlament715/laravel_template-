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
        foreach ($branches as $branch) {
            if ($branch->table()->count() == 0) {
                for ($i = 1, $n = rand(20, 50); $i < $n; $i++) {
                    Table::factory()->create([
                        "branch_id" => $branch->id,
                        "table_number" => $i,
                    ]);
                }
            }
        }

    }
}
