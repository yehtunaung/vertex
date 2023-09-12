<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\IncomeCategory;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => '1',
                'brand_id' => '1',
                'model' => 'test model one',
                'price' => '50000',
                'purchase_price' => '50000',
                'made_in' => 'china',
                'warranty' => '12 months',
                'voltage' => '10V',
                'size' => '100',
                'qty' => '100',
                'unit'  =>  'lone',
                'product_id' => 'product id test one',
                'item_id'  =>  '1',
                'discount_percent'  =>  '10',
                'discount_mmk'  =>  '5000',
                'product_status' => 'N'
            ],
            [
                'id' => '2',
                'brand_id' => '2',
                'model' => 'test model two',
                'price' => '500000',
                'purchase_price' => '500000',
                'made_in' => 'china',
                'warranty' => '12 months',
                'voltage' => '10V',
                'size' => '100',
                'qty' => '50',
                'unit'  =>  'lone',
                'product_id' => 'product id test two',
                'item_id'  =>  '2',
                'discount_percent'  =>  '5',
                'discount_mmk'  =>  '25000',
                'product_status' => 'N'
            ],
            [
                'id' => '3',
                'brand_id' => '1',
                'model' => 'test model three',
                'price' => '200000',
                'purchase_price' => '200000',
                'made_in' => 'china',
                'warranty' => '2 months',
                'voltage' => '10V',
                'size' => '100',
                'qty' => '50',
                'unit'  =>  'lone',
                'product_id' => 'product id test three',
                'item_id'  =>  '3',
                'discount_percent'  =>  '10',
                'discount_mmk'  =>  '20000',
                'product_status' => 'O'
            ],
        ];

        Product::insert($products);

        $customers = [
            [
                'id'    =>  '1',
                'name'  =>  'kyaw kyaw',
                'phone' =>  '09789456652',
                'address' => 'Soth Oakkla'
            ],
            [
                'id'    =>  '2',
                'name'  =>  'tun kyaw',
                'phone' =>  '09418625546',
                'address' => 'Insein'
            ],
            [
                'id'    =>  '3',
                'name'  =>  'Daw Mya',
                'phone' =>  '0945121789912',
                'address' => 'Hlaing'
            ],
        ];

        Customer::insert($customers);

        $income_categories = [
            [
                'id'        => 1,
                'name'      => 'Sale Invoice', //Sale Product
            ],
            [
                'id'        => 2,
                'name'      => 'Office Final',
            ]
        ];
        IncomeCategory::insert($income_categories);
    }
}