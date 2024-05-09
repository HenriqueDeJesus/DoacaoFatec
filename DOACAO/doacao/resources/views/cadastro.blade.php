
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
    <form class="form" method="post" action="{{ route('register') }}">

        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="/img/dlogo.png" alt="">
                <figcaption>DoAção</figcaption>
                <h2 class="title">Cadastro</h2>
            </div>
            @csrf
            <!-- Campo do nome e css de classe "campo" -->
            <div class="campo">
                <label><strong>Dados Pessoais</strong></label>
                <label for="name"><strong>Nome</strong></label>
                <input type="text" class="name" name="name" id="name" required>
            </div>

           
        <!-- Campo do cpf com css de class "campo" -->
        <div class="campo">
            <label for="cpf"><strong>CPF</strong></label>
            <input type="text" class="cpf" name="cpf" id="cpf" size="14" maxlength="14" placeholder="Ex.: xxx.xxx.xxx-xx" required>
        </div>
        <!-- Campo de Rua com css de classe "campo" -->
        
        <div class="campo">
            <label><strong>Dados de login</strong></label>
            <label for="email"><strong>Email</strong></label>
            <input type="email" class="email" name="email" id="email" required>
        </div>
        <!-- Campo de senha com css de classe "campo" -->
        <div class="campo">
            <label for="password"><strong>Senha: </strong></label>
            <input type="password" class="password" name="password" id="password" required>
        </div>

        <div class="campo">
            <label for="password_confirmation"><strong>Confirme sua Senha: </strong></label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="campo btn">
      <button onclick="myFunction()" type="submit">{{ __('Registrar') }}</button> 
         
        <a href="login.html" class="login">Login</a>
        <a href="index.html" class="retornar">Retornar</a>   
        </div>
    </div>
                
   </form> 

<script>
function myFunction() {
  alert("Usuário cadastrado com sucesso");
}
</script>

    
</body>
</html>
