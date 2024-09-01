<?php

namespace App\Http\Requests;

class CreatePedidoRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'producto' => 'required|string|max:255',
            'cuenta' => 'required|integer|exists:cuentas,id',
            'cantidad' => 'required|numeric|min:1',
            'valor' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:1',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
