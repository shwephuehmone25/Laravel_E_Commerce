<?php

namespace App\Http\Requests\Admin;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
        ];
    }

    /**
     * Summary of messages
     * @return array<string>
     */
    public function messages()
    {

        return [
            'name.required' => 'Name cannot be blank',
            'name.max' => 'Name must not be more than 50 characters.',
            'email.required' => 'Email is required',
            'email.email', 'Email must be an email ',
        ];
    }
}