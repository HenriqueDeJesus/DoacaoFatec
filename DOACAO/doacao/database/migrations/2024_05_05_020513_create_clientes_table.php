<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('IDCliente');
            $table->string('Nome', 100);
            $table->string('CPF', 14);
            $table->string('Email', 100);
            $table->string('Telefone', 15);
            $table->date('DataNascimento');
            $table->enum('Sexo', ['Masculino', 'Feminino', 'Outro']);
            $table->string('Senha', 100);
            $table->unsignedBigInteger('EnderecoID');
            $table->foreign('EnderecoID')->references('id')->on('enderecos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
