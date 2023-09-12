<?php

namespace App\Exports;

use App\Models\CustomerList;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Invoice;


class ExportUser implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd(request()->all());
        $dateRange = explode(" ",request()->range);
        $test = [];
        if (request()->status == 0) {
            
            $invoices = Invoice::with('particulars','customer')->whereNull('deleted_at')->get();
            
            $test = [];
            $total =0;
            $totalCreditLeft = 0;
            foreach($invoices as $invoice){
                $total += $invoice->amount;
                $totalCreditLeft = \App\Helpers\helper::getTotalCreditLeft($invoice->customer_id);
                $particualrs = '';                
                if(count($invoice->particulars) > 1) {
                    $arr = [];
                    foreach($invoice->particulars as $particular) {
                        // array_push($arr, $particular->particular);
                        $arr_test = [
                            'particulars' =>$particular->particular,
                            'particular_amount' => $particular->amount,
                            'totalCreditLeft'   => $totalCreditLeft
                        ];
                        array_push($arr,$arr_test);
                    };
                    // dd($arr);
                    foreach($arr as $key=> $p) {                        
                        if($key < sizeOf($arr)-1){
                            $particualrs .= $p['particulars'] .'('. $p['particular_amount'].')'.', ';
                        }else{
                            
                            $particualrs .= $p['particulars'] .'('. $p['particular_amount'].')';
                        }
                        
                    }

                } else {
                    foreach($invoice->particulars as $particular) {
                        $particualrs = $particular->particular;
                    };
                };

            


                $list = [
                    'invoice_date' => $invoice->invoice_date,
                    'voucher_no' => $invoice->customer->voucher_no ?? '-',
                    'name' => $invoice->customer->name ?? '-',
                    'phone_no' => $invoice->customer->phone_no ?? '-',
                    'totalCreditLeft' => $totalCreditLeft ?? '-',
                    'brand' => $invoice->customer->brand->name ?? '-',
                    'particulars' => $particualrs,
                    'item'  =>$invoice->customer->item->name ?? '-',
                    'complain'=>$invoice->complain,
                    'amount'    =>$invoice->amount,
                    'remark' =>$invoice->customer->remark ?? '-',
                    'royal_voucher'=>$invoice->royal_voucher,
                    'feedback' =>$invoice->customer->feedback ?? '-',
                ];

                array_push($test, $list);
                
            }
            $list1 = [
                'invoice_date' => "",
                'voucher_no' => "",
                'name' => "",
                'phone_no' => "",
                'totalCreditLeft' => "",
                'brand' => "",
                'particulars' => "",
                'item'  =>"",
                'complain'=>"Total",
                'amount'    =>$total,
                'remark' =>"",
                'royal_voucher'=>"",
                'feedback' =>"",
            ];
            array_push($test, $list1);

            
            
        } else {
            // $customerLists = DB::table('customer_lists')
            //     ->select(
            //         'invoices.invoice_date',
            //         'customer_lists.voucher_no',
            //         'customer_lists.name',
            //         'customer_lists.phone_no',
            //         'brands.name as brand',
            //         'particulars.particular',
            //         'items.name as item',
            //         'invoices.complain as complain',                
            //         'invoices.amount',
            //         'customer_lists.remark',
            //         'invoices.royal_voucher',
            //         'customer_lists.feedback',
            //     )
            //     ->join('items', 'items.id', 'customer_lists.item_id')
            //     ->join('brands', 'brands.id', 'customer_lists.brand_id')
            //     ->join('invoices', 'customer_id', 'customer_lists.id')
            //     ->join('particulars','invoice_id','invoices.id')
            //     ->where('brands.name', 'like', 'Beko')
            //     ->whereNotNull('customer_lists.voucher_no')
            //     ->whereNull('invoices.deleted_at')
            //     ->whereBetween('invoices.invoice_date',[$dateRange[0],$dateRange[2]])
            //     ->get();

            $invoices = Invoice::whereHas('customer', function ($query) {
                $query->whereHas('brand', function ($query) {
                    $query->where('name', 'like', 'Beko')->whereNotNull('voucher_no');
                });
            })->whereNull('deleted_at')->with(['customer','particulars'])->get();
            // dd($invoices);
            $test = [];
            $total_amount =0;
            $totalCreditLeft = 0;
            foreach($invoices as $invoice){
                $total_amount += $invoice->amount;
                $totalCreditLeft = \App\Helpers\helper::getTotalCreditLeft($invoice->customer_id);
                $particualrs = '';
                if(count($invoice->particulars) > 1) {
                    $arr = [];
                    foreach($invoice->particulars as $particular) {
                        // array_push($arr, $particular->particular);
                        $arr_test = [
                            'particulars' =>$particular->particular,
                            'particular_amount' => $particular->amount
                        ];
                        array_push($arr,$arr_test);
                    };

                    foreach($arr as $key=> $p) {                        
                        if($key < sizeOf($arr)-1){
                            $particualrs .= $p['particulars'] .'('. $p['particular_amount'].')'.', ';
                        }else{
                            
                            $particualrs .= $p['particulars'] .'('. $p['particular_amount'].')';
                        }
                        
                    }
                } else {
                    foreach($invoice->particulars as $particular) {
                        $particualrs = $particular->particular;
                    };
                };
            
                $list = [
                    'invoice_date' => $invoice->invoice_date,
                    'voucher_no' => $invoice->customer->voucher_no ?? '-',
                    'name' => $invoice->customer->name ?? '-',
                    'phone_no' => $invoice->customer->phone_no ?? '-',
                    'totalCreditLeft' => $totalCreditLeft ?? '-',
                    'brand' => $invoice->customer->brand->name ?? '-',
                    'particulars' => $particualrs,
                    'item'  =>$invoice->customer->item->name ?? '-',
                    'complain'=>$invoice->complain,
                    'amount'    =>$invoice->amount,
                    'remark' =>$invoice->customer->remark ?? '-',
                    'royal_voucher'=>$invoice->royal_voucher,
                    'feedback' =>$invoice->customer->feedback ?? '-',
                ];

                array_push($test, $list);
                
            }
            $list1 = [
                'invoice_date' => "",
                'voucher_no' => "",
                'name' => "",
                'phone_no' => "",
                'totalCreditLeft' => "",
                'brand' => "",
                'particulars' => "",
                'item'  =>"",
                'complain'=>"Total",
                'amount'    =>$total_amount,
                'remark' =>"",
                'royal_voucher'=>"",
                'feedback' =>"",
            ];
            array_push($test, $list1);
        }

        //  dd($test);
        return collect($test);
        //  dd($customerLists);

        //return $customerLists;
    }

    public function headings(): array
    {
        return ["Date", "Voucher No", "Name", "Phone No", "Credit Left", "Brand", "Particular", "Item", "Complain", "Amount", "Remark", "Royal Voucher", "Customer's Feedback"];
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
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(50);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('P')->setWidth(20);
            },
        ];
    }
}
