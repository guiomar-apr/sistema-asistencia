<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas'; // Asegúrate que sea correcto si cambiaste el nombre

    protected $fillable = ['nombre'];

    public function personal()
{
    return $this->hasMany(Personal::class);
}

}
