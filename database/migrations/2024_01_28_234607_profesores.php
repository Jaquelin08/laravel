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
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            // $table->id('numero_empleado')->unique()->default('0001');
            $table->timestamps();
            $table->string('numero_empleado')->unique()->default('0001');
            $table->string('nombre');
            $table->integer('numero_horas');
            $table->integer('divisionid')->constrained('division')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('puestoid')->constrained('puestos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->date('inicio_contrato');
            $table->date('fin_contrato');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
