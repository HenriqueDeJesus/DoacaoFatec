<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cadastro.css') }}" media="screen">
    <title>Doar Produto</title>
</head>
<body>
    <form class="form" method="post" action="/loginfuncionario/cadastro-doacaod" enctype="multipart/form-data">
        @csrf
        <!-- Início do formulário -->
        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="LogoD.png" alt="Logo">
                <figcaption>DoAção</figcaption>
                <h2 class="title">Reservar Produto</h2>
            </div>
            <!-- Campo do CPF -->
            <div class="campo">
                <label for="cpf"><strong>CPF</strong></label>
                <input type="text" class="cpf" name="cpf" id="cpf" size="14" value="{{ $reserva->user->cpf }}" maxlength="14" placeholder="Ex.: xxx.xxx.xxx-xx" required>
            </div>
            <!-- Campo do nome -->
            <div class="campo">
                <label><strong>Dados Pessoais</strong></label>
                <label for="user_nome"><strong>Nome</strong></label>
                <input type="text" class="nome" name="user_nome" id="user_nome" value="{{ $reserva->user->name }}" required>
            </div>

            <input type="hidden" name="idpessoa" id="idpessoa" value="{{ $reserva->user->id }}">

            <!-- Campo do código do produto -->
            <div class="campo">
                <label for="idproduto"><strong>Código do produto:</strong></label>
                <input type="text" class="idproduto" name="idproduto"  value="{{ $reserva->produto->id }}"required>
            </div>

            <!-- Campo do nome do produto -->
            <div class="campo">
                <label for="produtoname"><strong>Nome do produto:</strong></label>
                <input type="text" class="produtoname" name="produtoname" value="{{ $reserva->produto->NomeProduto }}" required>
            </div>

            <!-- Botões -->
            <div class="campo btn">
                <button type="submit">Realizar Doação</button> 
                <a href="https://doacaofatec.000webhostapp.com/Doacao/funcionario/sistema.php" class="retornar">Cancelar</a>   
            </div>
        </div>
    </form>           
    
    <!-- Script JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/buscarcpf.js') }}"></script>
</body>
</html>
