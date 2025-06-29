<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'celular',
        'correo',
        'estado_personal',
        'area_id',
        'cargo_id',
        'profesion_id',
    ];

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function cargo() {
        return $this->belongsTo(Cargo::class);
    }

    public function profesion() {
        return $this->belongsTo(Profesion::class);
    }

    public function biometria() {
        return $this->hasOne(Biometria::class);
    }
}
