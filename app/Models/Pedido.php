<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{

    protected $table = 'pedidos';
    use HasFactory;


    public function cuenta(): BelongsTo
    {
        return $this->belongsTo(Cuenta::class, 'id');
    }

}
