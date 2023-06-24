<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:150',
            'product_description' => 'required|string|max:250',
            'product_image' => 'nullable|image|max:2048',
            'price' => 'required|integer|min:1',
            'quantity' => 'nullable|integer'
            
        ];
    }
}