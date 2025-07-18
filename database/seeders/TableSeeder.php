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
        Table::factory()
            ->forBranch()
            ->withFacilities()
            ->count(rand(1, 5))
            ->create();
    }
}
