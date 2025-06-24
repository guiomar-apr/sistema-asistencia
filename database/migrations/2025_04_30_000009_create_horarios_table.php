<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 9. Horarios
class CreateHorariosTable extends Migration {
    public function up() {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->integer('tolerancia_min')->default(10);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('horarios');
    }
}