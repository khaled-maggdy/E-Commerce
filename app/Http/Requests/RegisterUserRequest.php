<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|max:12|string',
            'last_name' => 'required|max:12|string',
            'email' => 'required|email|max:50|unique:users,email',
            'phone' => 'required|max:14|regex:/\d/',
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'address' => 'required|max:58',
            'password' => 'required|max:14|confirmied|min:6'

        ];
    }
}
