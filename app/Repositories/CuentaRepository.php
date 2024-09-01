<?php

namespace App\Repositories;

use App\Models\Cuenta;

class CuentaRepository implements CuentaRepositoryInterface
{
    public function get(string $email): ?Cuenta
    {
        return Cuenta::where('email', '=', $email)->first();
    }

    public function create(string $nombre, string $email, string $telefono): ?Cuenta
    {
         return Cuenta::create(['nombre' => $nombre, 'email' => $email, 'telefono' => $telefono]);
    }

    public function update(): void
    {
        // TODO: Implement update() method.
    }

    public function delete(): void
    {
        // TODO: Implement delete() method.
    }
}
