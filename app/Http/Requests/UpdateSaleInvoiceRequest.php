<?php

namespace App\Http\Requests;

use App\Models\SaleInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSaleInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_invoice_edit');
    }

    public function rules()
    {
        return [
            'products.*' => [
                'integer',
            ],
            'products' => [
                'required',
                'array',
            ],
            'invoice_no' => [
                'string',
                'required',
            ],
            'customer_name' => [
                'string',
                'required',
            ],
            'customer_phone' => [
                'string',
                'nullable',
            ],
            'customer_address' => [
                'string',
                'nullable',
            ],
            'sale_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'total' => [
                'required',
            ],
            'tax' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
