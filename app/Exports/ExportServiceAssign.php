<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Helpers\helper;
use App\Models\ServiceAssign;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class ExportServiceAssign implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd(request()->all());
        if (request()->status == 1) {
            $serviceAssigns = DB::table('service_assigns')
                ->select(
                    'service_assigns.assign_date',
                    'customer_lists.voucher_no',
                    'customer_lists.name as cname',
                    'service_assigns.address',
                    'customer_lists.phone_no',
                    'customer_lists.id',
                    'service_assigns.particular',
                    'service_assigns.electric_available',
                    'users.name'
                )
                ->join('customer_lists', 'customer_lists.id', 'voucher_no_id')
                ->join('users', 'users.id', 'service_person_id')
                ->where('service_assigns.status', request()->status)
                ->whereBetween('assign_date', [request()->startdate, request()->enddate])
                ->whereNull('service_assigns.deleted_at')
                ->orderBy('assign_date', 'desc')
                ->get();

                
        } else {
            $serviceAssigns = DB::table('service_assigns')
                ->select(
                    'service_assigns.assign_date',
                    'customer_lists.voucher_no',
                    'customer_lists.name as cname',
                    'service_assigns.address',
                    'customer_lists.phone_no',
                    'customer_lists.id',
                    'service_assigns.particular',
                    'service_assigns.electric_available',
                    'users.name'
                )
                ->join('customer_lists', 'customer_lists.id', 'voucher_no_id')
                ->join('users', 'users.id', 'service_person_id')
                ->where('service_assigns.status', request()->status)
                ->where('service_person_id', request()->service_person_id)
                ->whereNull('service_assigns.deleted_at')
                ->orderBy('assign_date', 'desc')
                ->get();                
        }
        $totalCreditLeft = 0;
        $serviceAssignArray = [];

        foreach ($serviceAssigns as $serviceAssign) {
            $date = $serviceAssign->assign_date;
            $voucher_no = $serviceAssign->voucher_no;
            $customer_name = $serviceAssign->cname;
            $address = $serviceAssign->address;
            $phone_no = $serviceAssign->phone_no;
            $totalCreditLeft = helper::getTotalCreditLeft($serviceAssign->id);
            $particular = $serviceAssign->particular;
            $electric = $serviceAssign->electric_available;
            $name = $serviceAssign->name;

            $serviceAssignArray[] = [
                'date' => $date,
                'voucher_no' => $voucher_no,
                'customer_name' => $customer_name,
                'address' => $address,
                'phone_no' => $phone_no,
                'totalCreditLeft' => $totalCreditLeft,
                'particular' => $particular,
                'electric_available' => $electric,
                'name' => $name,
            ];
        }

        $serviceAssignCollection = collect($serviceAssignArray);
        return $serviceAssignCollection;
    }

    public function headings(): array
    {
        return ["Date", "Voucher No", "Name", "Address", "Phone No", "Credit Left", "Particular", "Electric Available", "Service Person Name"];
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
            },
        ];
    }

}
