<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Funcionario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'funcionarios';

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nome', 'CPF', 'Salario','email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Mutator for hashing the password before saving.
     *
     * @param string $value
     * @return void
     */

    // Mutator para criptografar a senha antes de salvar no banco de dados
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the user's type.
     *
     * @return string
     */
    public function getTipoUsuarioAttribute()
    {
        // Verifica se o tipo de usuário está na sessão
        if (session()->has('tipo_usuario')) {
            // Retorna o tipo de usuário da sessão
            return session('tipo_usuario');
        } else {
            // Retorna um valor padrão caso não esteja na sessão
            return 'FUNCIONARIO';
        }
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }
    
    public function polo()
    {
        return $this->belongsTo(Polo::class, 'polo_id');
    }
    
}










/*
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;


class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    // Mutator para criptografar a senha antes de salvar no banco de dados
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}



class Funcionario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'funcionarios';

    // Mutator para criptografar a senha antes de salvar no banco de dados
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}*/