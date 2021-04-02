<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "total" => "required",
            "cart_content" => "required|array",
            "cart_content.*.id" => "required",
            "cart_content.*.price" => "required",
            "cart_content.*.qty" => "required",
        ];
    }
}
