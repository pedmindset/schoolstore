<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $user = User::find($this->input('id'));
        return [
            'email' => ['nullable', 'string', 'max:255', Rule::unique('users', 'email')->ignore($user) ],
            'name' => 'required|string|min:3',
        ];
    }
}
