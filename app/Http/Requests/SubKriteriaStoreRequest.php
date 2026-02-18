<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubKriteriaStoreRequest extends FormRequest
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
            'nama' => 'required|string|max:100|unique:kriteria,nama',
            'bobot' => [
                'required',
                'numeric',
                'min:0'
            ],
        ];
    }
}
