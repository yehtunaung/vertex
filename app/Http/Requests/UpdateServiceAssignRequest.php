<?php

namespace App\Http\Requests;

use App\Models\ServiceAssign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceAssignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_assign_edit');
    }

    public function rules()
    {
        return [
            'assign_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'service_person_id' => [
                'required',
                'integer',
            ],
            'address' => [
                'string',
                'required',
            ],
            'electric_available' => [
                'nullable',
            ],
        ];
    }
}
