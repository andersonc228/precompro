<?php

namespace App\Repositories\Pedido;

use App\Models\Pedido;

class PedidoRepository implements PedidoRepositoryInterface
{

    public function get(Pedido $pedido): array
    {
        $returnPedido['producto'] = $pedido->producto;
        $returnPedido['cantidad'] = $pedido->catidad;
        $returnPedido['valor'] = $pedido->valor;
        $returnPedido['total'] = $pedido->total;
        $returnPedido['cuenta'] = $pedido->cuenta ? $pedido->cuenta->toArray() : null;

        return $returnPedido;
    }

    public function create(Pedido $pedido): bool
    {
        return $pedido->save();
    }

    public function update(Pedido $pedido): bool
    {
        return $pedido->save();
    }

    public function delete(Pedido $pedido): void
    {
        $pedido->delete();
    }
}
