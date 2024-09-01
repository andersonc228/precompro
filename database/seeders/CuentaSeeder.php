<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    public function run(): void
    {
        Cuenta::factory()->count(1)->create();
    }
}
