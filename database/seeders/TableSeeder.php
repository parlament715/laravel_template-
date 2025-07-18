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
        for ($i = 1; $i <= rand(5, 15); $i++) {
            Table::factory()
                ->forBranch()
                ->withFacilities()
                ->count(rand(1, 5))
                ->create();
        }
    }
}
