<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incapacidad extends Model
{
    protected $table = 'incapacidad';

    protected $fillable = ['empleado_id', 'fecha_inicio', 'fecha_fin', 'numero_dias'];

    protected $hidden = ['created_at', 'updated_at'];
}
