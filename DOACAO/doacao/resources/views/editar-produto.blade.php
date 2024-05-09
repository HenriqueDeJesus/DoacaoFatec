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
    <form method="POST" action="/loginfuncionario/editar-produto/{{ $produto->id }}">
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
                <input name="id" type="text" class="id" id="id" value="{{ $produto->id }}">
            </div>
            <div class="campo">
                <label for="NomeProduto"><strong>Nome</strong></label>
                <input type="text" class="NomeProduto" name="NomeProduto" id="NomeProduto" value="{{ $produto->NomeProduto }}">
            </div>
            
            <div class="campo">
                <label for="Categoria"><strong>Categoria</strong></label>
                <input type="text" class="Categoria" name="Categoria" id="Categoria" value="{{ $produto->Categoria }}">
            </div>

        <div class="campo btn">
        <button name="Submit" type="submit" class="formobjects" value="Atualizar">Atualizar</button> 
           <a href="sistema.php" class="retornar">Retornar</a>
        </div>
    </div>
                
    </form>
    
</body>
</html>