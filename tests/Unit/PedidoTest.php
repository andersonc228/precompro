<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cuenta;
use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba la creación de un pedido.
     *
     * @return void
     */
    public function test_crear_pedido()
    {
        $cuenta = Cuenta::factory()->create();

        $response = $this->postJson('/api/v1/pedido', [
            'id_cuenta' => $cuenta->id,
            'producto' => 'Producto 1',
            'cantidad' => 2,
            'valor' => 100.00,
            'total' => 200.00
        ]);

        $response->assertStatus(200);
    }

    /**
     * Prueba la cancelación de un pedido.
     *
     * @return void
     */
    public function test_eliminar_pedido()
    {
        $cuenta = Cuenta::factory()->create();
        $pedido = Pedido::factory()->create(['cuenta_id' => $cuenta->id]);

        $response = $this->deleteJson('/api/v1/pedido/' . $pedido->id);

        $response->assertStatus(200);
    }
}
