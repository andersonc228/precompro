<?php

namespace App\Http\Controllers;

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
}
