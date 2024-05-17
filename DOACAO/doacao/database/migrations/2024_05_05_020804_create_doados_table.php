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
        Schema::create('doados', function (Blueprint $table) {
            $table->id('id');
            $table->date('DataReserva');
            $table->unsignedBigInteger('idComtemplado');
            $table->unsignedBigInteger('IDProduto');
           // $table->unsignedBigInteger('IdPoloReservou');
            $table->foreign('idComtemplado')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('IDProduto')->references('id')->on('produtos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtosdoados');
    }
};
