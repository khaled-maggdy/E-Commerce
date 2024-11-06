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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'name' => 'required|max:40',
            'description' => 'required|max:150',
            'price' => 'required|max:10|min:1|regex:/\d/',
            'stock_quantity' => 'required|max:10|min:1|regex:/\d/'
        ];
    }
}
