<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UpdateCompanyRequest extends FormRequest
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
        $company_id = $this->route('company')->id;
        return [
            'name' => 'required|string|max:90|unique:companies,name,'. $company_id,
            'email' => 'nullable|email|unique:companies,email,' . $company_id,
            'website' => 'nullable|string',
            'logo' => [
                'nullable',
                File::image()
                    ->dimensions(Rule::dimensions()->minHeight(100)->minWidth(100))
            ]
        ];
    }
}
