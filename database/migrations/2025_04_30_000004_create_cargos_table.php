<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 4. Cargos
class CreateCargosTable extends Migration {
    public function up() {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('profesion');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('cargos');
    }
}