<?php

namespace App\Services;

use App\Exceptions\CuentaNotExistException;
use App\Exceptions\PedidoNotCreatedException;
use App\Models\Pedido;
use App\Repositories\Pedido\PedidoRepositoryInterface;
use function PHPUnit\Framework\exactly;


class PedidoService
{
    const PEDIDO_NOT_CREATED = 'No se pudo crear el pedido';
    const PEDIDO_NOT_UPDATE = 'No se pudo actualizar la cuenta';
    public function __construct(
        private readonly PedidoRepositoryInterface $pedidoRepository,
    ) {}

    /**
     * @param Pedido $pedido
     * @return array
     */
    public function get(Pedido $pedido): array
    {
        return $this->pedidoRepository->get($pedido);
    }

    /**
     * @param Pedido $pedido
     * @return void
     * @throws PedidoNotCreatedException
     */
    public function create(Pedido $pedido): void
    {
        if (!$this->pedidoRepository->create($pedido)) {
            throw new PedidoNotCreatedException(self::PEDIDO_NOT_CREATED);
        }

    }

    /**
     * @param Pedido $pedido
     * @return void
     */
    public function delete(Pedido $pedido): void
    {
        $this->pedidoRepository->delete($pedido);
    }

    /**
     * @param Pedido $pedido
     * @return void
     * @throws PedidoNotCreatedException
     */
    public function update(Pedido $pedido): void
    {
        if (!$this->pedidoRepository->update($pedido)) {
            throw new PedidoNotCreatedException(self::PEDIDO_NOT_UPDATE);
        }
    }
}
