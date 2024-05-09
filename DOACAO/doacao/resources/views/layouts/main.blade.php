<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Um site onde voce pode fazer doação, receber e ser um polo">
        <title>site doacao</title>
        <link rel="stylesheet" href="/css/styles.css">

    </head>
    <body>
        @yield('content')
        <footer class="final">
            <div class="foorter-container">
            <div class="card-foorter">
            <h1>REDES SOCIAIS</h1>
            <a href="#" class="redes">Fale conosco</a>
            <a href="https://www.facebook.com/" class="redes">Facebook</a><!--Redireciona o usuário para o facebook-->
            <a href="https://www.instagram.com/" class="redes">Instagram</a><!--Redireciona o usuario para o instagram-->
            <a href="https://www.youtube.com/" class="redes">Youtube</a><!--redireciona o usuario para o youtube-->
            </div>
        </footer> 
    </body>
</html>
