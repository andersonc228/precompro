<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    public function run(): void
    {
        Pedido::factory()->count(20)->create();
    }
}
