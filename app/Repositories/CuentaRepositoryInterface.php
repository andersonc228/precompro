<?php

namespace App\Repositories;

use App\Models\Cuenta;

interface CuentaRepositoryInterface
{
    public function get(string $email): ?Cuenta;
    public function create(string $nombre, string $email, string $telefono): ?Cuenta;
    public function update(): void;
    public function delete(): void;

}
