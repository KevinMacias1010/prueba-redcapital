<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Tabla de detalle de cotizaciones: `cotizaciones_d`.
     */
    public function up(): void
    {
        Schema::create('cotizaciones_d', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cotizacion_id')->constrained('cotizaciones_c')->cascadeOnDelete();
            $table->string('producto_sku');
            $table->foreign('producto_sku')->references('sku')->on('productos')->restrictOnDelete();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones_d');
    }
};


