<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale Invoices</title>
    <style>
        table {
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

        .table-border {
            border-bottom: 1px solid #ddd;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    {{-- @dd($saleInvoice) --}}
    <table>
        
            <tr>
                <td style="width:50%;" class="text-left">
                    <h3>Royal AC</h3><br><br>

                </td>
                <td class="text-right">
                    <h3 style="margin-top:0px">Invoice No {{ $saleInvoice->invoice_no }}</h3>
                </td>
            </tr>
            <tr>
                <td style="width:50%" class="text-left">
                    <p>No. 8/1/14, Kong Baung Lane-2</p>
                    <p>Kong Baung Street, Industrial Zone-7</p>
                    <p>Hlaing Tharyar T/S, Yangon, Myanmar</p>
                    <p>Tel: 09 780512076, 09 425502754</p>


                </td>
            </tr>
        

    </table>
    <br>
    <hr>
    <br>
    <table>
        
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%" class="text-right">
                    <br>
                    <table>
                        <tr>

                            <td class="text-left">{{ trans('cruds.saleInvoice.fields.sale_date') }}</td>
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp;
                                &nbsp;&nbsp;{{ date('d-m-Y', strtotime($saleInvoice->sale_date)) }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.saleInvoice.fields.customer_name') }}</td>
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $saleInvoice->customer->name }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.saleInvoice.fields.customer_phone') }}</td>
                            <td>:</td>
                            <td class="text-left"> &nbsp;&nbsp; &nbsp;&nbsp;{{ $saleInvoice->customer->phone }}</td>
                        </tr>
                        <tr>

                            <td class="text-left">{{ trans('cruds.saleInvoice.fields.customer_address') }}</td>
                            <td>:</td>
                            <td class="text-left">&nbsp;&nbsp; &nbsp;&nbsp;{{ $saleInvoice->customer->address }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        
    </table>
    <br>
    <hr>
    <br>
    <table>
        
            <thead>
                <tr>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.product_id') }}</th>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.brand') }}</th>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.item') }}</th>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.model_no') }}</th>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.qty') }}</th>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.unit_price') }}</th>
                    <th class="table-border">{{ trans('cruds.saleInvoice.fields.unit_total') }}</th>

                </tr>

            </thead>

            <tbody>
                @php
                    $sub_total = 0;
                @endphp
                @foreach ($saleInvoice->products as $product)
                    <tr>
                        <td class="table-border">{{ $product->product_id }}</td>
                        <td class="table-border">{{ $product->brand->name }}</td>
                        <td class="table-border">{{ $product->item->name }}</td>
                        <td class="table-border">{{ $product->model }}</td>
                        <td class="table-border">{{ $product->pivot->qty }}</td>
                        <td align="right" class="table-border">{{ (int) $product->pivot->unit_price }}</td>
                        <td align="right" class="table-border">{{ (int) $product->pivot->unit_total }}</td>
                        @php
                            $sub_total += (int) $product->pivot->unit_total;
                        @endphp
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" rowspan="3" align="left" style="border-bottom:none" class="table-border">
                        <div class="form-group">
                            <label for=""
                                class="d-block fw-bold">{{ trans('cruds.saleInvoice.fields.description') }}
                                :</label>
                            {{ $saleInvoice->description ?? '' }}
                        </div>
                    </td>
                    <td colspan="3" align="right" style="border-bottom:none" class="table-border">
                        {{ trans('cruds.saleInvoice.fields.sub_total') }}(ks)
                    </td>
                    <td align="right" style="border-bottom:none" class="table-border">
                        {{ $sub_total }}
                    </td>
                </tr>
                <tr>

                    <td colspan="3" align="right" style="border-bottom:none" class="table-border">
                        {{ trans('cruds.saleInvoice.fields.discount') }}(ks)
                    </td>
                    <td align="right" style="border-bottom:none" class="table-border">
                        {{ (int) $saleInvoice->discount }}
                    </td>
                </tr>
                <tr>

                    <td colspan="3" align="right" style="border-bottom:none" class="table-border">
                        {{ trans('cruds.saleInvoice.fields.total') }}(ks)
                    </td>
                    <td align="right" style="border-bottom:none" class="table-border">{{ (int) $saleInvoice->total }}
                    </td>
                </tr>
            </tbody>
       
    </table>

</body>

</html>
