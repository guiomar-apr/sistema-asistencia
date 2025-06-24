<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Rol;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre_usuario',
        'contraseña',
        'rol_id',
        'activo',
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    // ✅ Relación con el modelo Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
