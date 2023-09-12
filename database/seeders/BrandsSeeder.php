<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'id'    =>  1,
                'name'  => 'Beko'
            ],
            [
                'id'    =>  2,
                'name'  => 'Chigo'
            ],
            [
                'id'    =>  3,
                'name'  => 'Samsung'
            ],
            [
                'id'    =>  4,
                'name'  => 'Unknown'
            ],
        ];

        Brand::insert($brands);
    }
}
