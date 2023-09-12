<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\ServiceAssign;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Monthly Customers',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '30',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'customerList',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'Service Assigns',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '30',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'serviceAssign',
        ];

        $chart2 = new LaravelChart($settings2);

    //     $serviceAssigns = ServiceAssign::where('status', 1)
    //    ->where('follow_up','0')
    //    ->get();

    //    $count = 0;
    //    foreach($serviceAssigns as $serviceAssign){
    //     $month = Carbon::now()->diffInMonths($serviceAssign->assign_date);
    //     if($month == 6){
    //         $count++;
    //     }
    //    }

    //    dd($count);

        return view('home', compact('chart1', 'chart2'));
    }
}
