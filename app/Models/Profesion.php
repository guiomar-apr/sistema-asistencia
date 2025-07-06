<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personal;

class Profesion extends Model
{
    protected $table = 'profesiones';
    protected $fillable = ['nombre'];

    public function personal()
    {
        return $this->hasMany(Personal::class);
    }

    
}
