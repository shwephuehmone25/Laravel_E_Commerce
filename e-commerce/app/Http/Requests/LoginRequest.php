<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Summary of messages
     * @return array<string>
     */

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid',
            'password.min' => 'Password min length is 8 character',
            'password.required' => 'Password is required',
        ];
    }
}