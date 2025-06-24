<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 1. Roles
class CreateRolesTable extends Migration {
    public function up() {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('roles');
    }
}