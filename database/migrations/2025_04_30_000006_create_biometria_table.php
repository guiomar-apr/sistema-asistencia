<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 6. Biometría
class CreateBiometriaTable extends Migration {
    public function up() {
        Schema::create('biometria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->enum('tipo_biometrico', ['huella', 'qr', 'manual']);
            $table->text('valor');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('biometria');
    }
}