<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{

    protected $table = 'pedidos';
    use HasFactory;


    public function pedidos(): HasMany
    {
        return $this->hasMany(Cuenta::class);
    }

}
