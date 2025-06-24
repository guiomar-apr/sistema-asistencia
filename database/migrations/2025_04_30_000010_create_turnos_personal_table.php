<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 10. Turnos personal
class CreateTurnosPersonalTable extends Migration {
    public function up() {
        Schema::create('turnos_personal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->foreignId('horario_id')->constrained('horarios');
            $table->enum('dia_semana', ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo']);
            $table->enum('turno', ['M', 'T', 'M/T', 'GD', 'V']);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('turnos_personal');
    }
}
