<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_penghuni' => 'required|string',
            'no_telp' => 'required|string',
            'no_kerabat' => 'required|string',
            'date_mulai' => 'required|date',
            'durasi_kost' => 'required|integer',
            'total_harga' => 'required|integer',
            'foto_ktp' => ['required', 'mimetypes:application/pdf,image/jpeg,image/png,image/jpg', 'max:10240'],

            'metode_pembayaran' => 'required|string',
            'kamar_id' => ['required', 'exists:App\Models\KamarKost,id']
        ];
    }

    /**
     * Get the JSON format validation error.
     *
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $validator->errors()->all(),
            ], 400)
        );
    }
}
