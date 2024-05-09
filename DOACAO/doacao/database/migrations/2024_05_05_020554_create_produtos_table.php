<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('NomeProduto', 100);
            $table->string('Categoria', 100);
            $table->enum('Status', ['Disponivel', 'Reservado', 'Doado']);
            $table->string('Imagem', 255)->nullable();
            $table->unsignedBigInteger('polo_id');
            $table->foreign('polo_id')->references('IdPolo')->on('polos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
