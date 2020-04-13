<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCreateRequest extends FormRequest
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
            'user_id' => 'integer|required',
            'name' => 'string|required',
            'email' => 'string|nullable',
            'phone' => 'string|nullable',
            'phone2' => 'string|nullable',
            'address' => 'string|nullable',
            'address2' => 'string|nullable',
            'city' => 'string|nullable',
            'region' => 'string|nullable',
            'country' => 'string|nullable',
            'level' => 'string|nullable',
            'date_of_birth' => 'nullable',
            'postcode' => 'string|nullable',
            'lng' => 'nullable',
            'lat' => 'nullable',
        ];
    }
}
