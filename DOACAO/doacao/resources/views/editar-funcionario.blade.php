<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadastro.css">
    <title>Document</title>
</head>
<body>
    <!-- Início do formulário -->
    <form method="POST" action="/loginfuncionario/editar-funcionario/{{ $funcionario->id }}">
    @method('PUT')
    @csrf
        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="/img/dlogo.png" alt="">
                <figcaption>DoAção</figcaption>
                <h2 class="title">Editar Polo</h2>
            </div>
            <!-- Campo do nome e css de classe "campo" -->
            <div class="campo">
                <label for="id"><strong>ID ou Código</strong></label>
                <input name="id" type="text" class="id" id="id" value="{{ $funcionario->id }}">
            </div>
            <div class="campo">
                <label for="Nome"><strong>Nome</strong></label>
                <input type="text" class="Nome" name="Nome" id="Nome" value="{{ $funcionario->Nome }}">
            </div>
            
            <div class="campo">
                <label for="CPF"><strong>CPF</strong></label>
                <input type="text" class="CPF" name="CPF" id="CPF" value="{{ $funcionario->CPF }}">
            </div>

            <div class="campo">
                <label for="Salario"><strong>Salario</strong></label>
                <input type="text" class="Salario" name="Salario" id="Salario" value="{{ $funcionario->Salario }}">
            </div>

            <div class="campo">
                <label for="logradouro"><strong>Descição</strong></label>
                <input type="text" class="logradouro" name="logradouro" id="logradouro" value="{{ $funcionario->endereco->logradouro }}">
            </div>

        <div class="campo btn">
        <button name="Submit" type="submit" class="formobjects" value="Atualizar">Atualizar</button> 
           <a href="sistema.php" class="retornar">Retornar</a>
        </div>
    </div>
                
    </form>
    
</body>
</html>