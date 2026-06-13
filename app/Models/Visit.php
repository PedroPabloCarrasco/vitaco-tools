<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'nombre_visitante',
        'rut',
        'telefono',
        'motivo',
        'fecha_ingreso',
        'fecha_salida',

        // sistema QR
        'token',
        'status',
        'valid_from',
        'valid_until',
        'check_in_at',
        'check_out_at',
    ];
}
