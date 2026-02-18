<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubKriteriaUpdateRequest extends FormRequest
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
            'kriteria_id' => 'required|numeric|exists:kriteria,id',
            'nama' => [
                'required',
                'string',
                'max:100',
                // Rule::unique('sub_kriteria', 'nama')->ignore($this->id)
            ],
            'bobot' => [
                'required',
                'numeric',
                'min:0'
            ],
        ];
    }
}
