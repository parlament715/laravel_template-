<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilityNames = [
            'PlayStation',
            'VIP chairs',
            'Soft lighting',
            'Private booth',
            'AC',
            'Touchscreen menu',
            'Fast charger',
            'Bluetooth speakers',
            'Massage seats',
            '4K Display'
        ];
        foreach ($facilityNames as $facilityName) {
            Facility::firstOrCreate(["name" => $facilityName]);
        }
    }
}
