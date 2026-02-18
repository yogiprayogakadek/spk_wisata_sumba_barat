<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KriteriaUpdateRequest extends FormRequest
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
            'kode' => [
                'required',
                'string',
                'max:5',
                Rule::unique('kriteria', 'kode')->ignore($this->id)
            ],
            'nama' => [
                'required',
                'string',
                Rule::unique('kriteria', 'nama')->ignore($this->id)
            ],
            'sifat' => 'required|string|in:cost,benefit',
            'input_type' => 'required|string|in:numeric,sub',
            'bobot' => [
                'required',
                'numeric',
                'min:0'
                // 'regex:/^\\d{1,2}(\\.\\d{1,2})?$/'
            ],
        ];
    }
}
