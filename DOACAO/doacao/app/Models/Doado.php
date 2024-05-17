<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doado extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'doados';

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'IDProduto');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idComtemplado'); // Supondo que o campo que relaciona a reserva com o usuário seja 'IdPessoaReservou'
    }
}
