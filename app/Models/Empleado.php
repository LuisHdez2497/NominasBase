<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [
        'clave', 'nombre', 'apellido_paterno', 'apellido_materno', 'numero_ss',
        'rfc', 'puesto', 'sueldo_base', 'modo_pago', 'vales_despensa', 'correo'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function incapacidades(): HasMany{
        return $this->hasMany(Incapacidad::class);
    }
}
