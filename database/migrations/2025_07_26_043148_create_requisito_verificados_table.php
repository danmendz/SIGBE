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
        Schema::create('requisito_verificados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulacion_id');
            $table->unsignedBigInteger('requisito_id');
            $table->boolean('cumplido')->default(false);
            $table->text('observaciones')->nullable();

            $table->foreign('postulacion_id')
                ->references('id')
                ->on('postulacion_becas')
                ->onDelete('cascade');

            $table->foreign('requisito_id')
                ->references('id')
                ->on('requisito_becas')
                ->onDelete('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisito_verificados');
    }
};
