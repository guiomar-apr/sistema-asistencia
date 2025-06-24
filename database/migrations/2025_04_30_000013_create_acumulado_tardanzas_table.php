<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 13. Acumulado de tardanzas
class CreateAcumuladoTardanzasTable extends Migration {
    public function up() {
        Schema::create('acumulado_tardanzas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->string('mes', 7);
            $table->integer('dias_tarde');
            $table->integer('minutos_acumulados');
            $table->integer('dias_puntual');
            $table->integer('total_dias');
            $table->timestamp('generado_en');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('acumulado_tardanzas');
    }
}