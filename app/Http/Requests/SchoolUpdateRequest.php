<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school_category_id' => 'required|numeric',
            'name' => 'string|required',
            'email' => 'string|nullable',
            'phone' => 'string|nullable',
            'phone2' => 'string|nullable',
            'address' => 'string|nullable',
            'address2' => 'string|nullable',
            'city' => 'string|nullable',
            'region' => 'string|nullable',
            'country' => 'string|nullable',
            'postcode' => 'string|nullable',
            'lng' => 'nullable',
            'lat' => 'nullable',
            'duration' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
}
