<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 17. Reportes asistencia
class CreateReportesAsistenciasTable extends Migration {
    public function up() {
        Schema::create('reportes_asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generado_por')->constrained('usuarios');
            $table->foreignId('personal_id')->constrained('personal');
            $table->date('rango_inicio');
            $table->date('rango_fin');
            $table->enum('tipo_reporte', ['resumen_mensual', 'diario', 'faltas', 'tardanzas']);
            $table->enum('formato', ['excel', 'pdf']);
            $table->timestamp('fecha_generacion')->useCurrent();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('reportes_asistencias');
    }
}