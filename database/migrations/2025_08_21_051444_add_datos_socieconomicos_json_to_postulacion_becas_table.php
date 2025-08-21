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
        Schema::table('postulacion_becas', function (Blueprint $table) {
            $table->json('datos_socioeconomicos')->nullable()->after('estatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postulacion_becas', function (Blueprint $table) {
            $table->dropColumn('datos_socioeconomicos');
        });
    }
};
