<?php

namespace App\Exports;

use App\Models\CreditRecord;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class CreditRecordExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $customerId;

    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

    public function collection()
    {
        $creditRecords = DB::table('credit_records')->select(
            'customer_lists.name',
            'credit_records.date',
            'credit_records.status',
            'credit_records.credit_amount',
            'customer_lists.id'
        )->join('customer_lists', 'customer_lists.id', 'credit_records.customer_id')
            ->where('customer_id', $this->customerId)
            ->orderBy('date', 'desc')
            ->get();
        // dd($creditRecord);
        $totalCreditLeft = 0;
        $creditData = [];

        foreach ($creditRecords as $creditRecord) {
            $name = $creditRecord->name;
            $date = $creditRecord->date;
            $status = $creditRecord->status;
            $credit_amount = $creditRecord->credit_amount;
            $creditData[] = compact('name', 'date', 'status', 'credit_amount');
        }

        $totalCreditLeft = \App\Helpers\helper::getTotalCreditLeft($creditRecords[count($creditRecords) - 1]->id);

        $finalRow = [
            'name' => '',
            'date' => '',
            'status' => 'Total Credit Left',
            'credit_amount' => $totalCreditLeft,
        ];

        return collect($creditData)->push($finalRow);
    }

    public function headings(): array
    {
        return ["Name", "Date", "Status", "Credit Amount"];
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
            },
        ];
    }
}
