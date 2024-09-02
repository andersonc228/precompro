<?php

namespace App\Repositories\Cuenta;

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

    public function update(Cuenta $cuenta): bool
    {
        return $cuenta->save();
    }

    public function delete(Cuenta $cuenta): void
    {
        $cuenta->update(['activo' => false]);
    }

    public function getById(int $id, bool $active): ?Cuenta{

        if ($active) {
            return Cuenta::where('id', '=', $id)->where('activo', '=', true)->first();
        } else {
            return Cuenta::where('id', '=', $id)->first();
        }
    }
}
