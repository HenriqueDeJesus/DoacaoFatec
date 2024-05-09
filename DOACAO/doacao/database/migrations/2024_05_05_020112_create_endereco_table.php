<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 100);
            $table->string('NumeroCasa', 100);
            $table->string('Bairro', 100);
            $table->string('Cidade', 50);
            $table->string('Estado', 50);
            $table->string('CEP', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
