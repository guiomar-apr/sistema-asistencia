<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
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
