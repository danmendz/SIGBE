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
        Schema::create('comprobante_ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulacion_id');
            $table->string('tipo_documento', 100)->nullable();
            $table->string('emisor', 100)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->text('observaciones')->nullable();

            $table->foreign('postulacion_id')
                ->references('id')
                ->on('postulacion_becas')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_ingresos');
    }
};
