<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Funcionario extends User
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
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
}
