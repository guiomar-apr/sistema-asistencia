<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 11. Cronograma personal
class CreateCronogramaPersonalTable extends Migration {
    public function up() {
        Schema::create('cronograma_personal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->date('fecha');
            $table->foreignId('horario_id')->constrained('horarios');
            $table->enum('turno', ['GO', 'V']);
            $table->enum('estado', ['confirmado', 'pendiente']);
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('cronograma_personal');
    }
}