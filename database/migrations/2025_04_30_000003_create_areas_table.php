<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// 3. Áreas
class CreateAreasTable extends Migration {
    public function up() {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('areas');
    }
}