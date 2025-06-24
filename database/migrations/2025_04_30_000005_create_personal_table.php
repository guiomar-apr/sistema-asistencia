<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// 5. Personal
class CreatePersonalTable extends Migration {
    public function up() {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->char('dni', 8)->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->enum('sexo', ['masculino', 'femenino', 'otro']);
            $table->date('fecha_nacimiento');
            $table->string('celular', 15);
            $table->string('correo')->nullable();
            $table->enum('estado_personal', ['activo', 'no_activo'])->default('activo');
            $table->foreignId('profesion_id')->constrained('profesiones');
            $table->foreignId('area_id')->constrained('areas');
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('personal');
    }
}