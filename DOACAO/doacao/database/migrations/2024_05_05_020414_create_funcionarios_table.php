<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 100);
            $table->string('CPF', 14);
            $table->date('DataNascimento');
            $table->decimal('Salario', 10, 2);
            $table->string('email', 100);
            $table->string('Telefone', 15);
            $table->string('Cargo', 100);
            $table->string('password', 100);
            $table->enum('Tipo', ['Administrador', 'Funcionario']);
            $table->unsignedBigInteger('polo_id');
            $table->unsignedBigInteger('endereco_id');
            $table->foreign('polo_id')->references('IdPolo')->on('polos')->onDelete('cascade');
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
};
