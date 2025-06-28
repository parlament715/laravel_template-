<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            BookSeeder::class,
        ]);
    }
}
