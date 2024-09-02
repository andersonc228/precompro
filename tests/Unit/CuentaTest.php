<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cuenta;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CuentaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba la creación de una cuenta.
     *
     * @return void
     */
    public function test_crear_cuenta()
    {
        $response = $this->postJson('/api/v1/cuenta', [
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Prueba la obtención de la lista de cuentas.
     *
     * @return void
     */
    public function test_listar_cuentas()
    {
        $cuenta = Cuenta::factory()->create();

        $response = $this->getJson('/api/v1/cuenta/'.$cuenta->email);
        $response->assertStatus(200);
    }

    /**
     * Prueba la actualización de una cuenta.
     *
     * @return void
     */
    public function test_actualizar_cuenta()
    {
        $cuenta = Cuenta::factory()->create();

        $response = $this->putJson('/api/v1/cuenta', [
            'id' => $cuenta->id,
            'nombre' => 'Juan Actualizado',
            'email' => 'juan.actualizado@example.com',
            'telefono' => '987654321'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Prueba la eliminación de una cuenta.
     *
     * @return void
     */
    public function test_eliminar_cuenta()
    {
        $cuenta = Cuenta::factory()->create();
        $response = $this->deleteJson('/api/v1/cuenta/' . $cuenta->id);
        $response->assertStatus(200);

    }
}
