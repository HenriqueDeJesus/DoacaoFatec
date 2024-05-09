<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'logradouro', 'NumeroCasa', 'Bairro', 'Cidade', 'Estado', 'CEP'
    ];
}