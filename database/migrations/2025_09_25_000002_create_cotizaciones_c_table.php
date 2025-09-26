<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Tabla de cabecera de cotizaciones: `cotizaciones_c`.
     */
    public function up(): void
    {
        Schema::create('cotizaciones_c', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnDelete();
            $table->dateTime('fecha_emision');
            $table->decimal('total_bruto', 10, 2)->default(0);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones_c');
    }
};


