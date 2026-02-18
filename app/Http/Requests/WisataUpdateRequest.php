<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WisataUpdateRequest extends FormRequest
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
            'nama' => [
                'required',
                'string',
                'max:150',
                Rule::unique('wisata', 'nama')->ignore($this->id)
            ],
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,jfif,webp|max:2048',
            'rating_google' => 'required|numeric|min:1|max:5.0',
            'url_map_google' => 'required|url|string',
            'is_active' => 'required|in:1,0|numeric'
        ];
    }
}
