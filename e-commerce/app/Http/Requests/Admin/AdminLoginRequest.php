<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => ['required', 'email|exists:users,email'],
            'password' => ['required', 'min:8'],
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
            'email.exists', 'Email is already in used',
            'password.required' => 'Password is required.',
            'password.min' => 'Your password must be mininum 8 characters long.',
        ];
    }
}