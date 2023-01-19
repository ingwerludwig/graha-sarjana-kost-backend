<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddKostRequest extends FormRequest
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
            'nama_kost' => 'required|string',
            'alamat' => 'required|string',
            'fasilitas_listrik' => 'required|string',
            'fasilitas_air' => 'required|string',
            'no_telp' => 'required|string|max:13',
            'lat' => 'required',
            'long' => 'required',
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
