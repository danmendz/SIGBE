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
        Schema::create('bitacora_postulaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulacion_id');
            $table->unsignedBigInteger('usuario_reviso');
            $table->date('actualizado_el')->nullable();
            $table->enum('accion', ['revisado', 'aprobada', 'rechazada'])->default('revisado');

            $table->foreign('postulacion_id')->references('id')->on('postulacion_becas')->onDelete('cascade');
            $table->foreign('usuario_reviso')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora_postulaciones');
    }
};
