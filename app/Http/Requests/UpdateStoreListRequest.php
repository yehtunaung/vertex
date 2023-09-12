<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('store_list_edit');
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
            'particular_name' => [
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
                'integer',
                'required',
            ],
            // 'total_item' => [
            //     'required',
            // ],
            'price' => [
                'required',
            ],
        ];
    }
}
