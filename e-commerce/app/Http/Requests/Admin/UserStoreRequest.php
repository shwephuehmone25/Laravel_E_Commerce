<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:50',
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
            'name.required' => 'Name cannot be blank',
            'name.max' => 'Name must not be more than 50 characters.',
            'email.required' => 'Email is required',
            'password.required' => 'Password cannot be blank',
            'password.min' => 'Password must be more than 8 characters',
        ];
    }
}