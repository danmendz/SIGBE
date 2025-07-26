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
        Schema::create('postulacion_becas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beca_publicada_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->date('fecha_postulacion');
            $table->enum('estatus', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            $table->text('motivo_rechazo')->nullable();

            $table->foreign('beca_publicada_id')->references('id')->on('publicacion_becas')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulacion_becas');
    }
};
