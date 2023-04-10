<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_envios', function (Blueprint $table) {
            $table->id();
            $table->string('calle');
            $table->integer('numero');
            $table->integer('planta')->nullable();
            $table->string('puerta')->nullable();
            $table->string('ciudad');
            $table->integer('codigo_postal');
            $table->foreignId('usuario_id')->constrained('usuarios');
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
        Schema::dropIfExists('direccion_envios');
    }
};
