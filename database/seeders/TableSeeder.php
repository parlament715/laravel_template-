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
        foreach (Branch::pluck("id") as $branch_id){
            Table::factory()
                ->withFacilities()
                ->count(rand(10, 30))
                ->create(["branch_id"=>$branch_id]);
        }

    }
}
