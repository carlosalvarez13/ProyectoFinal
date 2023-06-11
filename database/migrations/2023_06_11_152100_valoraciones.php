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
        
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsu');
            $table->unsignedBigInteger('idPro');
            $table->integer('puntuacion');
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('idUsu')->references('idUsu')->on('users')->onDelete('cascade');
            $table->foreign('idPro')->references('idPro')->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valoraciones');
    }
};
