<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'string|required',
            'publicAccount'=>'required|boolean',
            'description'=>'nullable|string',
            'userName'=>'string|required',
            'photo'=>'nullable|file|image',
            'email'=>'string|required|unique:\App\Models\User,email',
            'password'=>'string|required|confirmed|min:8'
        ];
    }
}
