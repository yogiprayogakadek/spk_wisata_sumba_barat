<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KriteriaStoreRequest extends FormRequest
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
            'kode' => 'required|string|max:5|unique:kriteria,kode',
            'nama' => 'required|string|max:100|unique:kriteria,nama',
            'sifat' => 'required|string|in:cost,benefit',
            'input_type' => 'required|string|in:numeric,sub',
            'bobot' => [
                'required',
                'numeric',
                'min:0'
            ],
        ];
    }

    // public function messages()
    // {
    //     return [

    //     ];
    // }
}
