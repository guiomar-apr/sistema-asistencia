<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 16. Papeleta permiso
class CreatePapeletaPermisoTable extends Migration {
    public function up() {
        Schema::create('papeleta_permiso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personal');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('motivo');
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado']);
            $table->foreignId('aprobado_por')->nullable()->constrained('usuarios');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('papeleta_permiso');
    }
}