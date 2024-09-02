<?php

namespace App\Http\Requests;

class UpdateCuentaRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:cuentas,id',
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:cuentas',
            'telefono' => 'required|numeric|digits_between:3,9',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
