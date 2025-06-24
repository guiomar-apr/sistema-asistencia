<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 15. Papeleta cambio turno
class CreatePapeletaCambioTurnoTable extends Migration {
    public function up() {
        Schema::create('papeleta_cambio_turno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->date('fecha_modificada');
            $table->foreignId('horario_anterior_id')->constrained('horarios');
            $table->foreignId('horario_nuevo_id')->constrained('horarios');
            $table->text('motivo');
            $table->foreignId('registrado_por')->constrained('usuarios');
            $table->enum('estado', ['borrador', 'aprobado', 'rechazado']);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('papeleta_cambio_turno');
    }
}