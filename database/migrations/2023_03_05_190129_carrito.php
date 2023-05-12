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
        Schema::create('carrito', function (Blueprint $table) {
            $table->id('idCar');
            $table->unsignedBigInteger("idUsu") ;
            $table->unsignedBigInteger("idPro") ;

            $table->foreign("idUsu")
                  ->references("idUsu")
                  ->on("users")
                  ->onDelete("cascade") ;

            $table->foreign("idPro")
                  ->references("idPro")
                  ->on("producto")
                  ->onDelete("cascade") ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
