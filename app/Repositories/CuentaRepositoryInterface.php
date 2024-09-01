<?php

namespace App\Repositories;

use App\Models\Cuenta;

interface CuentaRepositoryInterface
{
    public function get(string $email): ?Cuenta;
    public function create(string $nombre, string $email, string $telefono): ?Cuenta;
    public function update(Cuenta $cuenta): bool;
    public function delete(Cuenta $cuenta): void;
    public function getById(int $id, bool $active): ?Cuenta;

}
