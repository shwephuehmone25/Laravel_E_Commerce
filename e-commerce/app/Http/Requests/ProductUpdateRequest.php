<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category' => 'required',
            'name' => 'required|max:50',
            'description' => 'required|max:225',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Summary of messages
     * @return array<string>
     */
    public function messages()
    {
        return [
            'category.required' => 'Category must be choose',
            'name.required' => 'Name is required',
            'name.max' => 'Name must not be more than 50 characters.',
            'description.required' => 'Description is required',
            'description.max' => 'Description must not be more than 225 characters.',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numberic.',
            'image.image' => 'Image must be an image',
        ];
    }
}