<?php

namespace App\Services;


use App\Exceptions\CuentaNotCreatedException;
use App\Exceptions\CuentaNotExistException;
use App\Exceptions\CuentaNotUpdateException;
use App\Exceptions\EmptyEmailException;
use App\Models\Cuenta;
use App\Repositories\Cuenta\CuentaRepositoryInterface;


class CuentaService
{
    const CUENTA_NOT_FOUND = 'No existe la cuenta';
    const CUENTA_NOT_CREATED = 'No se pudo crear la cuenta';
    const CUENTA_NOT_UPDATE = 'No se pudo actualizar la cuenta';
    public function __construct(
        private readonly CuentaRepositoryInterface $cuentaRepository,
    ) {}

    /**
     * @param string $email
     * @return array|null
     * @throws CuentaNotExistException
     * @throws EmptyEmailException
     */
    public function get(string $email): ? array
    {
        if (empty($email)) {
            throw new EmptyEmailException('Email es requerido');
        }
        $cuenta = $this->cuentaRepository->get($email);

        if (!$cuenta) {
            throw new CuentaNotExistException(self::CUENTA_NOT_FOUND);
        }

        return [
            'nombre' => $cuenta->nombre,
            'telefono' => $cuenta->telefono,
            'email' => $cuenta->email,
        ];
    }

    /**
     * @param string $nombre
     * @param string $email
     * @param int $telefono
     * @return Cuenta|null
     * @throws CuentaNotExistException
     */
    public function create(string $nombre, string $email, string $telefono): void
    {
        $cuentaNueva = $this->cuentaRepository->create($nombre, $email, $telefono);

        if (!$cuentaNueva) {
            throw new CuentaNotCreatedException(self::CUENTA_NOT_CREATED);
        }
    }

    /**
     * @param Cuenta $cuenta
     * @return void
     */
    public function delete(Cuenta $cuenta): void
    {
        $this->cuentaRepository->delete($cuenta);
    }

    /**
     * @param int $id
     * @param string $nombre
     * @param string $email
     * @param string $telefono
     * @return void
     * @throws CuentaNotExistException
     * @throws CuentaNotUpdateException
     */
    public function update(int $id, string $nombre, string $email, string $telefono): void
    {
        $cuenta = $this->cuentaRepository->getById($id, true);

        if (!$cuenta) {
            throw new CuentaNotExistException(self::CUENTA_NOT_FOUND);
        }

        $cuenta->nombre = $nombre;
        $cuenta->email = $email;
        $cuenta->telefono = $telefono;

        if (!$this->cuentaRepository->update($cuenta)){
            throw new CuentaNotUpdateException(self::CUENTA_NOT_UPDATE);
        }
    }
}
