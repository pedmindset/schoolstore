<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingInformationUpdateRequest extends FormRequest
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
            'customer_id' => 'numeric|required',
            'payment_method' => 'string|required',
            'momo_number' => 'string|required',
            'email' => 'string|nullable',
            'phone' => 'string|nullable',
            'phone2' => 'string|nullable',
            'address' => 'string|nullable',
            'address2' => 'string|nullable',
            'city' => 'string|nullable',
            'region' => 'string|nullable',
            'country' => 'string|nullable',
            'postcode' => 'string|nullable',
        ];
    }
}
