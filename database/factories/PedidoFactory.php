<?php

namespace Database\Factories;

use App\Models\Cuenta;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition(): array
    {
        $cuentas= Cuenta::pluck('id')->toArray();
        return [
            'producto' => fake()->name(),
            'cuenta_id' => fake()->randomElement($cuentas),
            'cantidad' => fake()->numberBetween(1,10),
            'valor' => fake()->randomFloat(),
            'total' => fake()->randomFloat(),
        ];
    }
}
