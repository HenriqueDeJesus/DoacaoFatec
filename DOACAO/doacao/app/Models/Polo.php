<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }
    
}