<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'produtos';

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
