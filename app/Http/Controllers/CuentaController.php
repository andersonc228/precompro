<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Models\Cuenta;
use App\Services\CuentaService;
use Illuminate\Http\JsonResponse;

class CuentaController extends Controller
{
    public function __construct(
        private CuentaService $cuentaService
    )
    {}

    public function get(string $email): JsonResponse
    {
        try {
            return $this->returnResponseSuccess('', $this->cuentaService->get($email));
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }

    public function create(CreateCuentaRequest $request): JsonResponse
    {
        try {
            return $this->returnResponseSuccess('Cuenta Creada',
                $this->cuentaService->create($request->input('nombre'),
                    $request->input('email'),
                    $request->input('telefono')
                )
            );
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }

    public function delete(Cuenta $cuenta): JsonResponse
    {
        try {
            $this->cuentaService->delete($cuenta);
            return $this->returnResponseSuccess('Cuenta Eliminada');
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }

    public function update(UpdateCuentaRequest $request)
    {
        try {
            $this->cuentaService->update(
                $request->input('id'),
                $request->input('nombre'),
                $request->input('email'),
                $request->input('telefono')
            );
            return $this->returnResponseSuccess('Cuenta Actualizada');
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }
}
