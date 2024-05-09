<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produtoreservados', function (Blueprint $table) {
            $table->id('IdProdutoReservado');
            $table->date('DataReserva');
            $table->unsignedBigInteger('IdPessoaReservou');
            $table->unsignedBigInteger('IDProduto');
            $table->unsignedBigInteger('IdPoloReservou');
            $table->foreign('IdPessoaReservou')->references('IDCliente')->on('clientes')->onDelete('cascade');
            $table->foreign('IDProduto')->references('ID')->on('produtos')->onDelete('cascade');
            $table->foreign('IdPoloReservou')->references('IdPolo')->on('polos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtoreservados');
    }
};
