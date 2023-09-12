<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpenseExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $expenses = Expense::with('expense_category')->orderBy('entry_date', 'asc')->whereNull('deleted_at')->get();
        // dd($expenses);
        $export = [];
        $total_price=0;
        $total_qty = 0;
        foreach($expenses as $expense){
            $list =[
                'entry-date' => $expense->entry_date,
                'category'      =>  $expense->expense_category->name,
                'description'   =>  $expense->description,
                'shop_address'   =>  $expense->shop_address,
                'qty'           =>  $expense->quantity,
                'amount'        => $expense->amount,
                'unit'          =>  $expense->unit,
                
            ];
            array_push($export,$list);
            $total_price += $expense->amount;
            $total_qty += $expense->quantity;
        }
        $list1 =[
            'entry-date' => "",
            'category'      =>  "",
            'description'   =>  "",
            'shop_address' => 'Total',
            'qty'           =>  $total_qty,
            'amount'        => $total_price,
            'unit'          =>  "",
            
        ];
        // dd($export);

        array_push($export,$list1);

       

        return collect($export);
    }

    public function headings(): array
    {
        return ["Enntry Date",  "Expense Category", "Description","Shop Address","Quantity","Amount", "Unit"];
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
                
            },
        ];
    }

}
