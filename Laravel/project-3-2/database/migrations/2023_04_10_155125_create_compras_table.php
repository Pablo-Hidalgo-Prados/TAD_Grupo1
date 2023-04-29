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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->float('subtotal');
            $table->string('direccion');
            $table->string('estado');
            $table->foreignId('descuento_id')->nullable()->constrained('descuentos');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('direccion_id')->constrained('direccion_envios');
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
        //Schema::dropIfExists('compras');
        Schema::table('compras', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
        });
    }
};
