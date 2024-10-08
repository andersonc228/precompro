<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{

    protected $table = 'cuentas';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'activo',
    ];
}
