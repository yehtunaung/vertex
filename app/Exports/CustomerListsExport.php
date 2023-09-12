<?php

namespace App\Exports;

use App\Helpers\helper;
use App\Models\CustomerList;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerListsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if (request()->status == 0) {
            $customerLists = DB::table('customer_lists')->select(
                'customer_lists.date',
                'customer_lists.voucher_no',
                'customer_lists.name as customer_name',
                'customer_lists.address',
                'customer_lists.phone_no',
                'customer_lists.particular',
                'items.name as item_name',
                'customer_lists.model_no',
                'brands.name as brand_name',
                'customer_lists.id',
                'customer_lists.remark',
                'customer_lists.feedback'
            )
                ->join('items', 'items.id', 'customer_lists.item_id')
                ->join('brands', 'brands.id', 'customer_lists.brand_id')
                ->whereNull('customer_lists.deleted_at')
                ->orderBy('date', 'desc')
                ->get();
            // dd($customerLists);
        } else {
            $customerLists = DB::table('customer_lists')->select(
                'customer_lists.date',
                'customer_lists.voucher_no',
                'customer_lists.name as customer_name',
                'customer_lists.address',
                'customer_lists.phone_no',
                'customer_lists.particular',
                'items.name as item_name',
                'customer_lists.model_no',
                'brands.name as brand_name',
                'customer_lists.id',
                'customer_lists.remark',
                'customer_lists.feedback'
            )
                ->join('items', 'items.id', 'customer_lists.item_id')
                ->join('brands', 'brands.id', 'customer_lists.brand_id')
                ->where('brands.name', 'like', 'Beko')
                ->whereNotNull('customer_lists.voucher_no')
                ->whereNull('customer_lists.deleted_at')
                ->orderBy('date', 'desc')
                ->get();
        }

        $totalCreditLeft = 0;
        $customerData = [];

        foreach ($customerLists as $customerList) {
            // dd($customerList);
            $date = $customerList->date;
            $voucher_no = $customerList->voucher_no;
            $customer_name = $customerList->customer_name;
            $address = $customerList->address;
            $phone_no = $customerList->phone_no;
            $totalCreditLeft = helper::getTotalCreditLeft($customerList->id);
            $particular = $customerList->particular;
            $item_name = $customerList->item_name;
            $model_no = $customerList->model_no;
            $brand_name = $customerList->brand_name;
            $remark = $customerList->remark;
            $feedback = $customerList->feedback;

            $customerData[] = [
                'date' => $date,
                'voucher_no' => $voucher_no,
                'customer_name' => $customer_name,
                'address' => $address,
                'phone_no' => $phone_no,
                'totalCreditLeft' => $totalCreditLeft,
                'particular' => $particular,
                'item_name' => $item_name,
                'model_no' => $model_no,
                'brand_name' => $brand_name,
                'remark' => $remark,
                'feedback' => $feedback,
            ];
        }

        $customerCollection = collect($customerData);


        return $customerCollection;
    }

    public function headings(): array
    {
        return ["Date", "Voucher No", "Name", "Address", "Phone No", "Total Credit Left", "Particular", "Item", "Model No", "Brand", "Remark", "Feedback"];
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
            },
        ];
    }
}
