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
    <form class="form" method="post" name="dados" action="updateProduto.php" onSubmit="return enviardados();">

        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="/img/dlogo.png" alt="">
                <figcaption>DoAção</figcaption>
                <h2 class="title">Cadastro de Produto</h2>
            </div>
            <!-- Campo do nome e css de classe "campo" -->
            <div class="campo">
                <label for="id"><strong>ID ou Código</strong></label>
                <input name="id" type="text" class="id" id="id" value="{{ $doacao->id }}">
            </div>
            <div class="campo">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" class="nome" name="nome" id="nome" value="{{ $doacao->title }}">
            </div>
            
            <div class="campo">
                <label for="descricao"><strong>Descição</strong></label>
                <input type="descricao" class="descricao" name="descricao" id="descricao" value="{{ $doacao->description }}">
            </div>
            <div class="campo">
                <label for="tipo"><strong>Tipo</strong></label>
                <input type="tipo" class="tipo" name="tipo" id="tipo" value="{{ $doacao->categoria }}">
            </div>

        <div class="campo btn">
        <button name="Submit" type="submit" class="formobjects" value="Atualizar">Atualizar</button> 
           <a href="sistema.php" class="retornar">Retornar</a>
        </div>
    </div>
                
    </form>
    
</body>
</html>