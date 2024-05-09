<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  // Importa a classe Request do Laravel para lidar com solicitações HTTP
use App\Models\Funcionario;  // Importa o modelo Funcionario para interagir com dados de funcionários
use Illuminate\Support\Facades\Hash;  // Importa a classe Hash do Laravel para lidar com funções de hash
use Illuminate\Support\Facades\Auth;  // Importa a classe Auth do Laravel para autenticação de usuários
use App\Models\Doacao;
use App\Models\Produto;
use App\Models\Itemdoado;
use App\Models\Polo;
use App\Models\Endereco;


class FuncionarioController extends Controller  // Define a classe FuncionarioController que estende a classe Controller
{
    public function loginfuncionario()  // Método para exibir a página de login do funcionário
    {
        return view('loginfuncionario');  // Retorna a view 'loginfuncionario' para exibir a página de login
    }

    public function createpolo()
    {
        return view('cadastro-polo');
    }

    public function logar(Request $request)  // Método para lidar com o processo de login do funcionário
    {
        // Valida os dados do formulário de login
        $credentials = $request->validate([
            'email' => ['required', 'email'],  // O campo de e-mail é obrigatório e deve ser um e-mail válido
            'password' => ['required']  // O campo de senha é obrigatório
        ]);

        // Tenta autenticar o usuário com as credenciais fornecidas
        if (Auth::guard('funcionario')->attempt($credentials)) {
            // Se o login for bem-sucedido, regenera a sessão
            $request->session()->regenerate();

            // Recupera o funcionário autenticado
            $funcionario = Auth::guard('funcionario')->user();

            // Obtém o tipo de usuário do funcionário autenticado
            $tipoUsuario = $funcionario->tipo_usuario;

            // Armazena o tipo de usuário na sessão
            session(['tipo_usuario' => $tipoUsuario]);

            // Redireciona o usuário para o painel do funcionário
            return redirect()->intended('loginfuncionario/dashboard');
        } else {
            // Se o login falhar, retorna com erro
            return back()->withErrors([
                'email' => 'Erro de login',  // Define uma mensagem de erro para o campo de e-mail
            ])->onlyInput('email');  // Mantém apenas o campo de e-mail preenchido ao retornar
        }
    }

    public function dashboard()  // Método para exibir o painel do funcionário
    {
        $produtos = Produto::all();
        return view('dashboardfuncionario', ['produtos' => $produtos]); // Retorna a view 'dashboardfuncionario' para exibir o painel
    }

    public function reservar()
    {  
        $produtos = Produto::all();
        return view('sistemareservar', ['produtos' => $produtos]);
    }

    public function edit($id)
    {
        $doacao = Doacao::findOrFail($id);
        return view('editar', compact('doacao'));
    }
    

    public function update(Request $request, $id)
    {
        $doacao = Doacao::findOrFail($id);
        $doacao->update($request->all());
        return redirect()->route('doacaos.index');
    }

    public function doados()
    {  
        $itemdoados = Itemdoado::all();

        return view('sistemadoados', ['itemdoados' => $itemdoados]);
    }

    public function polo()  // Método para exibir o painel do funcionário
    {
        $polos = Polo::with('endereco')->get();

        return view('polos', compact('polos')); // Retorna a view 'dashboardfuncionario' para exibir o painel
    }


    public function funcionario()  // Método para exibir o painel do funcionário
    {
        $funcionarios = Funcionario::all();
        $funcionarios = Funcionario::with('endereco')->get();
        $funcionarios = Funcionario::with('polo')->get();

        return view('funcionario', ['funcionarios' => $funcionarios]); // Retorna a view 'dashboardfuncionario' para exibir o painel
    }

    public function logout(Request $request)  // Método para lidar com o processo de logout do funcionário
    {
        Auth::guard('funcionario')->logout();  // Realiza o logout do funcionário autenticado

        $request->session()->invalidate();  // Invalida a sessão do usuário

        $request->session()->regenerateToken();  // Regenera o token da sessão

        return redirect('loginfuncionario');  // Redireciona o usuário de volta para a página de login
    }

    public function create()
    {
        $polos = Polo::all(); // Busque todos os polos disponíveis
        return view('cadastro-funcionario', ['polos' => $polos]);
    }


    public function store(Request $request)
    {
        // Criação do endereço
        $endereco = new Endereco();
        $endereco->logradouro = $request->logradouro;
        $endereco->NumeroCasa = $request->NumeroCasa;
        $endereco->Bairro = $request->bairro;
        $endereco->Cidade = $request->cidade;
        $endereco->Estado = $request->estado;
        $endereco->CEP = $request->cep;
        // Salva o endereço e recupera o ID gerado automaticamente
        $endereco->save();
        $endereco_id = $endereco->id;

        // Criação do funcionário
        $funcionario = new Funcionario();
        $funcionario->Nome = $request->nome;
        $funcionario->CPF = $request->cpf;
        $funcionario->DataNascimento = $request->datanascimento;
        $funcionario->Salario = $request->salario;
        $funcionario->Email = $request->email;
        $funcionario->Telefone = $request->telefone;
        $funcionario->Cargo = $request->cargo;
        $funcionario->password = $request->password;
        $funcionario->Tipo = $request->tipo;
        // Defina os outros campos do funcionário aqui
        $funcionario->polo_id = $request->polo_id;
        $funcionario->endereco_id = $endereco_id;
        $funcionario->save();

        // Redireciona para uma página de confirmação ou para onde desejar
        return redirect('/loginfuncionario/cadastro-funcionario')->with('success', 'Funcionário cadastrado com sucesso!');
        // Arrumar a routa para ir pra tela de login
    }

    public function createProduto()
    {
        $polos = Polo::all(); // Busque todos os polos disponíveis
        return view('cadastro-produto', ['polos' => $polos]);
    }

    public function storeproduct(Request $request) {

        $produto = new Produto;
        $produto->NomeProduto = $request->produto;
        $produto->Categoria = $request->categoria;
        $produto->polo_id = $request->polo_id;
        //$produto->description = $request->description;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/produto'), $imageName);

            $produto->image = $imageName;

        }

        $request->merge(['Status' => 'Disponivel']);

        $produto->save();

        return redirect('/loginfuncionario/dashboard')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function storepolo(Request $request)
    {
        // Criação do endereço
        $endereco = new Endereco();
        $endereco->logradouro = $request->logradouro;
        $endereco->NumeroCasa = $request->NumeroCasa;
        $endereco->Bairro = $request->bairro;
        $endereco->Cidade = $request->cidade;
        $endereco->Estado = $request->estado;
        $endereco->CEP = $request->cep;
        // Salva o endereço e recupera o ID gerado automaticamente
        $endereco->save();
        $endereco_id = $endereco->id;

        $polo = new Polo();
        $polo-> NomePolo = $request->polo;
        $polo->endereco_id = $endereco_id;

        $polo->save();

        return redirect('/loginfuncionario/cadastro-polo')->with('success', 'Produto cadastrado com sucesso!');
    }
    /*

    public function editpolo(Request $request, $id)
    {
        $polo = Polo::where('idPolo', $id)->firstOrFail();
        return view('editar-polo', compact('polo'));
    }"{{ route('doacaos.edit', $doacao->id) }}"*/


    public function editpolo($id)
    {
        $polo = Polo::findOrFail($id);
        return view('editar-polo', ['polo' => $polo]);
    }

    public function editproduto($id)
    {
        $produto = Produto::findOrFail($id);
        return view('editar-produto', ['produto' => $produto]);
    }
/*
    public function edit($id)
    {
        $doacao = Doacao::findOrFail($id);
        return view('editar', compact('doacao'));
    }
*/


    public function updatePoloAndEndereco(Request $request, $id)
    {
        // Encontrar o polo pelo ID
        $polo = Polo::findOrFail($id);
        
        // Validar os dados recebidos do formulário para o polo
        $request->validate([
            'NomePolo' => 'required|string|max:255',
            // Adicione outras regras de validação conforme necessário
        ]);
        
        // Atualizar os atributos do polo
        $polo->update([
            'NomePolo' => $request->input('NomePolo'),
        ]);
        
        // Encontrar o endereço associado ao polo
        $endereco = Endereco::findOrFail($polo->endereco_id);
        
        // Atualizar os atributos do endereço
        $endereco->update([
            'logradouro' => $request->input('logradouro'),
        ]);
        
        // Redirecionar de volta à página de edição do polo com uma mensagem de sucesso
        return redirect('/loginfuncionario/cadastro-polo')->with('success', 'Produto cadastrado com sucesso!');
    }


    public function editfuncionario($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('editar-funcionario', ['funcionario' => $funcionario]);
    }


    public function updateFuncionario(Request $request, $id)
    {
        // Encontrar o polo pelo ID
        $funcionario = Funcionario::findOrFail($id);
        
        // Atualizar os atributos do polo
        $funcionario->update([
            'Nome' => $request->input('Nome'),
            'CPF' => $request->input('CPF'),
            'Salario' => $request->input('Salario'),
            'logradouro' => $request->input('logradouro'),
        ]);
        
        // Encontrar o endereço associado ao polo
        $endereco = Endereco::findOrFail($funcionario->endereco_id);
        
        // Atualizar os atributos do endereço
        $endereco->update([
            'logradouro' => $request->input('logradouro'),
        ]);
        
        // Redirecionar de volta à página de edição do polo com uma mensagem de sucesso
        return redirect('/loginfuncionario/dashboard')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function destroyFuncionario($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        return redirect('/loginfuncionario/funcionarios')->with('sucesso', 'Funcionario removido com sucesso!');
    }

    public function destroyPolo($id)
    {
        $polo = Polo::find($id);
        $polo->delete();
        return redirect('/loginfuncionario/polos')->with('sucesso', 'Polo removido com sucesso!');
    }

    public function destroyProduto($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('/loginfuncionario/dashboard')->with('sucesso', 'Produto removido com sucesso!');
    }

    public function updateProduto(Request $request, $id)
    {
        // Encontrar o polo pelo ID
        $produto = Produto::findOrFail($id);
        
        // Atualizar os atributos do polo
        $produto->update([
            'NomeProduto' => $request->input('NomeProduto'),
            'Categoria' => $request->input('Categoria'),
        ]);
        
        // Redirecionar de volta à página de edição do polo com uma mensagem de sucesso
        return redirect('/loginfuncionario/dashboard')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /*public function updatepolo(Request $request, $id)
    {
        $polo = Polo::findOrFail($id);
        $polo->update($request->all());
        
        return redirect()->route('editar-polo', ['IdPolo' => $id]);
    }*/
/*
    public function updatepolo(Request $request)
    {
        $polo = Polo::findOrFail($id)->update($request->all());
        return redirect()->route('editar-polo');
    }*/
}


