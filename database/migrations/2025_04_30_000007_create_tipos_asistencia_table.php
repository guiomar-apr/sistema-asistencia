<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 7. Tipos de asistencia
class CreateTiposAsistenciaTable extends Migration {
    public function up() {
        Schema::create('tipos_asistencia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('tipos_asistencia');
    }
}