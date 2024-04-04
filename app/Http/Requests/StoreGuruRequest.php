<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuruRequest extends FormRequest
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
    public function rules()
    {
    
        return [
            'nip' => 'required|unique:guru,nip',
            'nama_guru' => 'required',
            'jk' => 'required|in:pria,wanita',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
        ];
    }
}
