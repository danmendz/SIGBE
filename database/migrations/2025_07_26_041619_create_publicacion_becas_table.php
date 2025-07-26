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
        Schema::create('publicacion_becas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requisitos_beca_id');
            $table->unsignedBigInteger('periodo_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('requisitos')->nullable();

            $table->foreign('requisitos_beca_id')->references('id')->on('requisito_becas')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion_becas');
    }
};
