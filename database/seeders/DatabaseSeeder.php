<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\TableSeeder;
use Database\Seeders\BranchSeeder;
use Database\Seeders\FacilitySeeder;
use Database\Seeders\FacilitiesTableSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
//            BookSeeder::class,
            BranchSeeder::class,
            TableSeeder::class,
            FacilitySeeder::class,
            FacilitiesTableSeeder::class,
        ]);
    }
}
