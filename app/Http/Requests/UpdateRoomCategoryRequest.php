<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class UpdateRoomCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows("room_category_edit");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "room_type" => [
                "required",
                "string",
            ],
            "room_img" => [
                "max:2000",
                "mimes:jpeg,png"
            ],
            "capacity" => [
                "required",
                "string"
            ],
            "cost" => [
                "required",
                "string",
            ],
            "description" => [
                "required",
                "string",
            ],
        ];
    }
}
