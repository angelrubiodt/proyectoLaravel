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
        Schema::table('productos', function (Blueprint $table) {
            $table->string('comprador')->nullable()->after('imagen');
            $table->string('ubicacion_extraccion')->nullable()->after('comprador');
            $table->date('fecha_extraccion')->nullable()->after('ubicacion_extraccion');
            $table->string('calidad_material')->nullable()->after('fecha_extraccion');
            $table->string('estado_procesamiento')->nullable()->after('calidad_material');
            $table->text('observaciones')->nullable()->after('estado_procesamiento');
            $table->string('codigo_referencia')->nullable()->after('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn([
                'comprador',
                'ubicacion_extraccion',
                'fecha_extraccion',
                'calidad_material',
                'estado_procesamiento',
                'observaciones',
                'codigo_referencia',
            ]);
        });
    }
};
