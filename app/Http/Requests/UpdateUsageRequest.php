<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('usage_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => [
                'required',
            ],
            'particular' => [
                'required',
            ],
            'item_no' => [
                'required',
            ],
            'product' => [
                'string',
                'required',
            ],
            'qty' => [
                'required',
            ],
            'used_person' => [
                'string',
                'required',
            ],
            'remark' => [
                'string',
                'required',
            ],
        ];
    }
}
