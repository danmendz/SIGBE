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
        Schema::create('dato_socioeconomicos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 20);
            $table->decimal('ingreso_mensual', 10, 2);
            $table->string('tipo_vivienda', 50);
            $table->string('dependiente', 50);
            $table->string('ocupacion_dependiente', 50);
            $table->integer('dependientes_economicos');
            $table->enum('estado_civil', ['soltero', 'casado'])->default('soltero');

            $table->foreign('matricula')->references('matricula')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dato_socioeconomicos');
    }
};
