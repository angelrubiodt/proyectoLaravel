<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 10);
            $table->string('tipo_material', 50);
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->string('comprador', 50);
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('email', 100)->unique();
            $table->string('telefono', 15);
            $table->text('mensaje');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('productos');
    }
}
