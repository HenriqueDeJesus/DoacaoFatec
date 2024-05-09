<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doacao;

class DoacaoController extends Controller
{
    public function index() {

        return view('welcome');

    }

    public function cadastro() {

        return view('cadastro');

    }

    public function acesso() {

        return view('loginUser');

    }

   /* public function loginfuncionario() {

        return view('loginfuncionario');

    }*/

    public function sistema() {

        $doacaos = Doacao::all();

        return view('sistema', ['doacaos' => $doacaos]);
    }

    public function store(Request $request) {

        $doacao = new Doacao;

        $doacao->categoria = $request->categoria;
        $doacao->title = $request->title;
        $doacao->description = $request->description;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/produto'), $imageName);

            $doacao->image = $imageName;

        }

        $doacao->save();

        return redirect('/');
    }
}
/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoacaoController extends Controller
{
    
    public function index() {

       $doacoes = Doacao::all();

       return view('welcome', ['doacoes' => $doacoes]);
    }

    public function create() {
        return view('doacoes.create');
    }

    public function store(Request $request){

        $doacao = new Doacao;

        $doacao->categoria = $request->categoria;
        $doacao->title = $request->title;
        $doacao->description = $request->description;
        
        $doacao->save();

    }

}
*/