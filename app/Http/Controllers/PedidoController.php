<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Services\PedidoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function __construct(
        private PedidoService $pedidoService
    )
    {}

    public function get(Pedido $pedido): JsonResponse
    {
        try {
            return $this->returnResponseSuccess('', $this->pedidoService->get($pedido));
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }

    public function create(CreatePedidoRequest $request): JsonResponse
    {
        try {
            $pedido = new Pedido();
            $pedido->producto = $request->input('producto');
            $pedido->cuenta_id = $request->input('cuenta');
            $pedido->cantidad = $request->input('cantidad');
            $pedido->valor = $request->input('valor');
            $pedido->total = $request->input('total');
            $this->pedidoService->create($pedido);

            return $this->returnResponseSuccess('Pedido creado correctamente');
        }catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }

    public function delete(Pedido $pedido): JsonResponse
    {
        try {
            $this->pedidoService->delete($pedido);
            return $this->returnResponseSuccess('Pedido Eliminada');
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }

    public function update(UpdatePedidoRequest $request, Pedido $pedido): JsonResponse
    {
        try {
            $pedido->cantidad = $request->input('cantidad');
            $pedido->producto = $request->input('producto');
            $pedido->valor = $request->input('valor');
            $pedido->total = $request->input('total');

            $this->pedidoService->update($pedido);
            return $this->returnResponseSuccess('Pedido Actualizado');
        } catch (\Exception $e) {
            return $this->returnResponseFail($e->getMessage());
        }
    }
}
