<?php

namespace App\Repositories\Pedido;


use App\Models\Pedido;

interface PedidoRepositoryInterface
{
    public function get(Pedido $pedido): array;
    public function create(Pedido $pedido): bool;
    public function update(Pedido $pedido): bool;
    public function delete(Pedido $pedido): void;

}
