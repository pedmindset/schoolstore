<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuarantorRequest extends FormRequest
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
            'guarantor_name' => 'required|string',
            'guarantor_phone' => 'required',
            'guarantor_momo' => 'required',
            'guarantor_email' => 'required',
            'guarantor_address' => 'required',
        ];
    }
}
