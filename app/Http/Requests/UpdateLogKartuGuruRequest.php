<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLogKartuGuruRequest extends FormRequest
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
            'id_kartu_g' => 'required|exists:kartu_guru,id_kartu_g',
            'status' => 'required|boolean',
            'keterangan' => 'required|in:-,izin,sakit',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'keterangan' => $this->keterangan ?? '-',
        ]);
    }
}
