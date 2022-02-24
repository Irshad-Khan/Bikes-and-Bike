<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Al Haj FAW Motors — (FAW Group)',
            'address' => 'Lahoe, Pakistan'
        ]);
        Company::create([
            'name' => 'Atlas Honda — (Honda Motorcycles)',
            'address' => 'Lahoe, Pakistan'
        ]);
        Company::create([
            'name' => 'DYL Motorcycles — (Yamaha Motor Company)',
            'address' => 'Lahoe, Pakistan'
        ]);
        Company::create([
            'name' => 'Ghandhara Industries — (Isuzu)',
            'address' => 'Lahoe, Pakistan'
        ]);
        Company::create([
            'name' => 'Ghandhara Nissan — (Dongfeng Motor Corporation',
            'address' => 'Lahoe, Pakistan'
        ]);
    }
}
