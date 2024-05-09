<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index() {

        $usuarios = Usuario::all();

        return view('product', 
        [
            'usuarios' => $usuarios
        ]); /* Idade2 é o nome que tem que ser passado como chave no html {{ $idade2 }} */
    }

    public function create() {
        return view('usuarios.create');
    }

}
