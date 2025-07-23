<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class TableSeeder extends Seeder
{

    public function run(): void
    {
        if (!Branch::query()->exists()) {
            $this->createTable();
        } else {
            Branch::all()->each(function (Branch $branch) {
                $this->createTable($branch);
            });
        }
    }

    public function createTable(Branch $branch = null): void
    {
        Table::factory()
            ->forBranch($branch)
            ->withFacilities()
            ->count(rand(1, 5))
            ->create();
    }

}
