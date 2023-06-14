<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->id('idCar');
            $table->unsignedBigInteger('idUsu');
            $table->unsignedBigInteger('idPro');
            $table->integer('cantidad')->default(1); // Agregar la columna cantidad con valor por defecto 1
            $table->timestamps();

            $table->foreign('idUsu')->references('idUsu')->on('users')->onDelete('cascade');
            $table->foreign('idPro')->references('idPro')->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('carrito');
    }
};
