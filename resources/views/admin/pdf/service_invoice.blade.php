<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoices</title>
    <style>
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
        {{-- @dd($invoice) --}}
        {{-- @foreach ($invoice as $invoice) --}}

            <tr>
                <td style="width:50%;" class="text-left">
                    <h3>vERTEX</h3><br><br>

                </td>
                <td class="text-right">
                    <h3 style="margin-top:0px">Royal Voucher {{$invoice->royal_voucher}}</h3>
                    <br>
                    <h5 style="margin-top:0px">Voucher No {{$invoice->customer ? $invoice->customer->voucher_no : ''}}</h5>
                </td>
            </tr>
            <tr>
                <td style="width:50%" class="text-left">
                    <p >No. 8/1/14, Kong Baung Lane-2</p>
                    <p >Kong Baung Street, Industrial Zone-7</p>
                    <p >Hlaing Tharyar T/S, Yangon, Myanmar</p>
                    <p >Tel: 09 780512076, 09 425502754</p>


                </td>
            </tr>


        {{-- @endforeach  --}}

    </table>
    <br>
    <hr>
    <br>
    <table>
        {{-- @dd($invoice->invoice_date) --}}
        {{-- @foreach ($invoice as $invoice) --}}
            <tr>
                <td style="width: 50%" class="text-left">
                    <table>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.date') }}</td>
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ date('d-m-Y', strtotime($invoice->invoice_date)) }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.name') }}</td>
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->name : ''  }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.address') }}</td>
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->address : '' }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.phone_no') }}</td>
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->phone_no : ''}}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%" class="text-right">

                    <table>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.item') }}</td>
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->item->name : '' }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.brand') }}</td>
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->brand->name : ''}}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.customerList.fields.model_no') }}</td>
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->model_no : '' }}</td>
                        </tr>

                    </table>
                </td>
            </tr>
        {{-- @endforeach --}}
    </table>
    <br>
    <hr>
    <br>
    <table>
        <thead>
            <tr>
                <td class="text-left table-border" style="width: 50%">{{ trans('cruds.customerList.fields.particular') }}</td>
                <td style=" width:50%" class=" text-right table-border">{{ trans('cruds.customerList.fields.price')}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->particulars as $key => $particular)
                                    <tr>
                                        <td style="width:50%" class="text-left table-border">{{$particular->particular}}</td>
                                        <td style="text-align: right" class="text-right table-border">{{(int)$particular->amount}}</td>

                                    </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <hr>
    <br>

    <table>
        <tr>
            <td class="text-left" style="width:50%">
                <table>
                    <tr>

                        <td class="text-left">{{ trans('cruds.customerList.fields.remark') }}</td>
                        <td>:</td>
                        <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->remark : '' }}</td>
                    </tr>
                    <tr>

                        <td class="text-left">{{ trans('cruds.invoice.fields.complain') }}</td>
                        <td>:</td>
                        <td class="text-left" style="white-space: nowrap;"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->complain ?? '-' }}</td>
                    </tr>
                    <tr>

                        <td class="text-left">{{ trans('cruds.invoice.fields.customer_feedback') }}</td>
                        <td>:</td>
                        <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $invoice->customer ? $invoice->customer->feedback : '' }}</td>
                    </tr>
                </table>
            </td>
            <td class="text-right" style="width:50%">
                <table>
                    <tr>

                        <td class="text-right">{{ trans('cruds.invoice.fields.amount') }}</td>
                        <td>:</td>
                        <td class="text-right"> &nbsp;&nbsp; &nbsp;&nbsp;{{ (int) $invoice->amount }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
