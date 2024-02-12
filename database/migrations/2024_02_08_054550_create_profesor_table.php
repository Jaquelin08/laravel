<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesor', function (Blueprint $table) {
            $table->id();
            $table->string('numero_empleado');
            $table->string('nombre');
            $table->integer('numero_horas');
            $table->foreignId('puesto_id')->constrained('puesto');
            $table->foreignId('division_id')->constrained('division');
            $table->date('inicio_contrato');
            $table->date('fin_contrato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor');
    }
};