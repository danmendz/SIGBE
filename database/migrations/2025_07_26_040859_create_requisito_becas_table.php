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
        Schema::create('requisito_becas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_beca_id');
            $table->unsignedBigInteger('codigo_requisito_id');
    
            $table->foreign('tipo_beca_id')->references('id')->on('tipo_becas')->onDelete('cascade');
            $table->foreign('codigo_requisito_id')->references('id')->on('codigo_requisitos')->onDelete('restrict');
    
            $table->unique(['tipo_beca_id', 'codigo_requisito_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisito_becas');
    }
};
