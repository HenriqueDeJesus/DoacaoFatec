<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'reservas';

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'IDProduto');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'IdPessoaReservou'); // Supondo que o campo que relaciona a reserva com o usuário seja 'IdPessoaReservou'
    }
}
