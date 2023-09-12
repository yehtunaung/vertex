<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'id'    =>  1,
                'name'  =>  'TLWM'
            ],
            [
                'id'    =>  2,
                'name'  =>  'FLWM'
            ],
            [
                'id'    =>  3,
                'name'  =>  'WM'
            ],
            [
                'id'    =>  4,
                'name'  =>  'Aircooler'
            ],
            [
                'id'    =>  5,
                'name'  =>  'Water Cooler'
            ],
            [
                'id'    =>  6,
                'name'  =>  'AC'
            ],
            [
                'id'    =>  7,
                'name'  =>  'Ref'
            ],
            [
                'id'    =>  8,
                'name'  =>  'Side by Side'
            ],
            [
                'id'    =>  9,
                'name'  =>  'Dryer'
            ],
            [
                'id'    =>  10,
                'name'  =>  '2 door'
            ],
            [
                'id'    =>  11,
                'name'  =>  'WD'
            ],
        ];
        // 
        Item::insert($items);
    }
}
