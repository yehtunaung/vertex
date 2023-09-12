<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Lists</title>
    <style>
        body {
             font-family: 'pyidaungsu' !important;
             font-style: normal;
           }
        table{
            width: 100%;
            padding-left: 10px;
            padding-right: 10px
        }
        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }
        .table-border{
            border-bottom: 1px solid #ddd;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
    
</head>
<body>
   
    <table >
        {{-- @dd($customerList) --}}
        {{-- @foreach ($customerList as $customerList) --}}
            
            <tr>
                <td style="width:50%;" class="text-left">
                    <h3>Royal Aircon</h3><br><br>
                    
                </td>
                <td class="text-right">
                    <h5 style="margin-top:0px">Voucher No {{$customerList->voucher_no ?? ''}}</h5>
                </td>
            </tr>
            <tr>
                <td style="width:50%" class="text-left">
                    <p class="mb-1 text-nowrap">No. 507, U Wisara Road, 41 Quarter, North Dagon Tsp, Yangon</p>
                    <p class="mb-1">North Dagon Township, Yangon</p>
                    <p class="mb-0">09-421 054 044, 09-444 366 010, </p>
                    <p class="mb-0">09-444 366 020</p>
                </td>
            </tr>
            
            
        {{-- @endforeach  --}}
       
    </table>
    <br>
    <hr>
    <br>
    <table>
            <tr>
                <td style="width: 60%;"></td>
                <td style="width: 40%" class="text-right">
                    <table>
                        <tr>
                            <td class="text-left">{{ trans('cruds.customerList.fields.date') }}</td> 
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ date('d-m-Y', strtotime($customerList->entry_date)) }}</td>
                        </tr>
                        <tr>
                            
                            <td class="text-left">{{ trans('cruds.customerList.fields.name') }}</td> 
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $customerList->name  }}</td>
                        </tr>
                        <tr>
                            
                            <td class="text-left">{{ trans('cruds.customerList.fields.address') }}</td> 
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $customerList->address }}</td>
                        </tr>
                        <tr>
                            
                            <td class="text-left">{{ trans('cruds.customerList.fields.phone_no') }}</td> 
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ $customerList->phone_no }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        {{-- @endforeach --}}
    </table>
    <br>
    <hr>
    <br>
    <table cellpadding="8">
        <thead>
            <tr>
                <th align="left">{{ trans('cruds.customerList.fields.item') }}</th>
                <th align="left">{{ trans('cruds.customerList.fields.brand') }}</th>
                <th align="left">{{ trans('cruds.customerList.fields.model_no') }}</th>
                <th align="left">{{ trans('cruds.customerList.fields.particular') }}</th>
            </tr>
            
        </thead>
        <tbody>
            <tr>
                <td align="left">{{ $customerList->item->name }}</td>
                <td align="left">{{ $customerList->brand->name }}</td>
                <td align="left">{{ $customerList->model_no }}</td>
                <td align="left">{{ $customerList->particular }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <hr>
    <br>

    <table>
        <tr>
            <td style="width: 55%;"></td>
            <td style="width: 40%;" class="text-right">
                <table>
                    <tr>                            
                        <td class="text-left">{{ trans('cruds.customerList.fields.remark') }}</td> 
                        <td>:</td>
                        <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ $customerList->remark ?? '-' }}</td>
                    </tr>
                    {{-- <tr>
                        
                        <td class="text-left">{{ trans('cruds.customerList.fields.complain') }}</td> 
                        <td>:</td>
                        <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $customerList->feedback ?? '-' }}</td>
                    </tr> --}}
                    <tr>
                        
                        <td class="text-left">{{ trans('cruds.customerList.fields.feedback') }}</td> 
                        <td>:</td>
                        <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $customerList->feedback ?? '-' }}</td>
                    </tr>
                </table>
            </td>
            {{-- <td class="text-right" style="width:50%">
                <table>
                    <tr>
                    
                        <td class="text-right">{{ trans('cruds.customerList.fields.amount') }}</td> 
                        <td>:</td>
                        <td class="text-right"> &nbsp;&nbsp; &nbsp;&nbsp;{{ (int) $customerList->amount }}</td>
                    </tr>
                </table>
            </td> --}}
        </tr>
    </table>
</body>
</html>