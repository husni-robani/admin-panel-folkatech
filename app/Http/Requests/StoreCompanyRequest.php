<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|max:90|unique:companies',
            'email' => 'required|email|unique:companies',
            'website' => 'required',
            'logo' => [
                'required',
                File::image()
                ->dimensions(Rule::dimensions()->minHeight(100)->minWidth(100))
            ]
        ];
    }
}
