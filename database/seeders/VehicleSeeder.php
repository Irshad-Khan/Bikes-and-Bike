<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'name' => 'Hatchback',
            'model' => 'Maruti Suzuki Swift',
            'price' => '2400000',
            'company_id' => 1
        ]);

        Vehicle::create([
            'name' => 'Sedan',
            'model' => 'Maruti Suzuki Ciaz',
            'price' => '2400000',
            'company_id' => 2
        ]);

        Vehicle::create([
            'name' => 'MPV',
            'model' => 'Datsun GO+',
            'price' => '3400000',
            'company_id' => 3
        ]);

        Vehicle::create([
            'name' => 'SUV',
            'model' => 'Land Rover Discovery Sport',
            'price' => '5400000',
            'company_id' => 4
        ]);


        Vehicle::create([
            'name' => 'Crossover',
            'model' => 'Volvo S60 Cross Country',
            'price' => '5400000',
            'company_id' => 5
        ]);

        Vehicle::create([
            'name' => 'Coupe',
            'model' => 'Mercedes-Benz GLE Coupe',
            'price' => '6400000',
            'company_id' => 1
        ]);

        Vehicle::create([
            'name' => 'Convertible',
            'model' => 'Audi A3 Cabriolet',
            'price' => '6400000',
            'company_id' => 2
        ]);
    }
}
