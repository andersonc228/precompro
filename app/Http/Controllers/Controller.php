<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Pedido;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function returnResponseSuccess(string $message, array|null $data = null): JsonResponse
    {
        $response = ['success' => true, 'message' => $message];
        if (!is_null($data)) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    public function returnResponseFail(string $message, int $status = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(['success' => false, 'message' => $message], $status);
    }

    public function enviarDatos(?Pedido $pedido, ?Cuenta $cuenta)
    {
        $wsUrl = 'http://localhost:8080';

        $client = new Client();
        $response = $client->post($wsUrl, [
            'json' => [
                'cuenta' => $cuenta,
                'pedido' => $pedido,
            ]
        ]);
        return response()->json(['status' => 'pedido enviado']);
    }
}
