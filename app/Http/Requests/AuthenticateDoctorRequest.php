<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class AuthenticateDoctorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
            return [
                'phone' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('doctors', 'phone'),  // Ensure phone is unique in the 'doctors' table
                ],
            ];
        
    }
}
