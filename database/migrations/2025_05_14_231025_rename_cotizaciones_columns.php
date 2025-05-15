<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCotizacionesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->renameColumn('ubicacion', 'origen');
            $table->renameColumn('correo_electronico', 'email');
            $table->renameColumn('numero_contacto', 'telefono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->renameColumn('origen', 'ubicacion');
            $table->renameColumn('email', 'correo_electronico');
            $table->renameColumn('telefono', 'numero_contacto');
        });
    }
}
