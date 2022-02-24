<?php

namespace Database\Seeders;

use App\Models\VehicleImage;
use Illuminate\Database\Seeder;

class VehicleImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleImage::create([
            'name' => 'Hatchback.png',
            'vehicle_id' => 1
        ]);

        VehicleImage::create([
            'name' => 'Sedan.png',
            'vehicle_id' => 2
        ]);

        VehicleImage::create([
            'name' => 'MPV.png',
            'vehicle_id' => 3
        ]);

        VehicleImage::create([
            'name' => 'SUV.png',
            'vehicle_id' => 4
        ]);

        VehicleImage::create([
            'name' => 'Crossover.png',
            'vehicle_id' => 5
        ]);

        VehicleImage::create([
            'name' => 'Coupe.png',
            'vehicle_id' => 6
        ]);

        VehicleImage::create([
            'name' => 'Convertible.png',
            'vehicle_id' => 7
        ]);
    }
}
