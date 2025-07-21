<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\TableSeeder;
use Database\Seeders\BranchSeeder;
use Database\Seeders\FacilitySeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            BookSeeder::class,
            BranchSeeder::class,
            FacilitySeeder::class,
            TableSeeder::class,
        ]);
    }
}
