<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = Table::all();
        foreach ($tables as $table) {
            $random_number_facilities = random_int(0, 4);
            if ($random_number_facilities != 0) {
                foreach (Facility::inRandomOrder()->take($random_number_facilities)->get() as $facility) {
                    DB::table('facility_tables')->updateOrInsert([
                        'table_id' => $table->id,
                        'facility_id' => $facility->id
                    ]);
                };
            };
        }
    }
}
