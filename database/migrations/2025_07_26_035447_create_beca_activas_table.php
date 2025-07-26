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
        Schema::create('beca_activas', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 20);
            $table->foreign('matricula')->references('matricula')->on('users')->onDelete('cascade');

            $table->foreignId('periodo_beca')->constrained('periodos')->onDelete('cascade');
            $table->foreignId('tipo_beca_id')->constrained('tipo_becas')->onDelete('cascade');

            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_autorizacion')->nullable();
            $table->date('fecha_terminacion')->nullable();

            $table->text('motivo_baja')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->boolean('activa')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beca_activas');
    }
};
