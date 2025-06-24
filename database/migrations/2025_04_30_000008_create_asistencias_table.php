<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 8. Asistencias
class CreateAsistenciasTable extends Migration {
    public function up() {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->date('fecha');
            $table->time('hora');
            $table->enum('tipo_marcacion', ['entrada', 'salida']);
            $table->foreignId('tipo_asistencia_id')->constrained('tipos_asistencia');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('asistencias');
    }
}