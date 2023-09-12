<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductListExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $productLists = DB::table('products')->select(
        //     'products.product_id',
        //     'items.name as item_name',
        //     'brands.name as brand_name',
        //     'products.model',
        //     'products.price',
        //     'products.discount_percent',
        //     'products.discount_mmk',
        //     'products.made_in',
        //     'products.warranty',
        //     'products.voltage',
        //     'products.size',
        //     'products.qty',
        //     'products.unit',
        //     'products.product_status'
        // )
        // ->join('items','items.id','products.item_id')
        // ->join('brands','brands.id','products.brand_id')
        // ->get();
        $products = Product::with('item','brand')->whereNull('deleted_at')->get();
        // dd($products);
        $export = [];
        $qty_total=0;
        $price_toal=0;
        $product_satatus ='';
        foreach($products as $product){
            ($product->product_status == 'N' ) ? $product_satatus = "New" : $product_satatus == "Old";
            $list =[
                'product_id'    =>  $product->product_id,
                'item_name' => $product->item->name,
                'brand_name' => $product->brand->name,
                'model'     =>  $product->model,                
                'discount_percent'  =>  $product->discount_percent,
                'discount_mmk'      =>  $product->discount_mmk,
                'made_in'           =>  $product->made_in,
                'warranty'          =>  $product->warranty,
                'voltage'           =>  $product->voltage,
                'size'              =>  $product->size,
                'qty'               =>  $product->qty,
                'price'     =>  $product->price,
                'purchase_price'     =>  $product->purchase_price,
                'unit'              =>  $product->unit,
                'product_status'    =>  $product_satatus, 

            ];
            $qty_total += $product->qty;
            $price_toal += $product->price;



            array_push($export,$list);
            

        }
        $list1 =[
            'product_id'    => "",
            'item_name' => "",
            'brand_name' => "",
            'model'     =>  "",                
            'discount_percent'  =>  "",
            'discount_mmk'      =>  "",
            'made_in'           =>  "",
            'warranty'          =>  "",
            'voltage'           =>  "",
            'size'              =>  "Total",
            'qty'               =>  $qty_total,
            'price'     =>  $price_toal,
            'purchase_price'     =>  "",
            'unit'              =>  "",
            'product_status'    =>  "", 

        ];
        array_push($export,$list1);

        // dd($qty_total);
        // dd($export);
        

        return collect($export);
    }

    public function headings(): array
    {
        return ["Product_id", "Item", "Brand","Model",  "Discount Percent", "Discount Amount", "Made In", "Warranty", "Voltage", "Size", "Qty","Price","Purchase Price","Unit","Product Status"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                // $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(20);
            },
        ];
    }

}
