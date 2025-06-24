<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 12. Tardanzas diarias
class CreateTardanzasDiariasTable extends Migration {
    public function up() {
        Schema::create('tardanzas_diarias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->date('fecha');
            $table->time('hora_entrada');
            $table->time('hora_esperada');
            $table->enum('estado', ['puntual', 'tardanza']);
            $table->integer('minutos_tarde')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('tardanzas_diarias');
    }
}