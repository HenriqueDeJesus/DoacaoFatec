@extends('layouts.main')

@section('title', 'Doacao')

@section('content')

<div class="cabecalho"></div>

    <header>    
        <div class="logo">
            <img src="/img/dlogo.png" alt="Logo do site Doação" ><!--Imagem logo-->
           <figcaption>DoAção</figcaption><!--escrita embaixo do logo-->
        </div>
        
        <nav ><!--Isso seria o cabeçalho da tela principal-->
            <l1>
                <a href="#">Inicio</a>
            </l1>

            <l1>
            <a href="#">Doar</a>
            </l1>
            
            <l1>
            <a href="/sistema">Pedir Doação</a>
            </l1>

            <l1>
            <a href="#">Polos</a>
            </l1>

            <l1>
            <a href="#">Quem Somos</a>
            </l1>
        </nav>
        @auth 
        <li class="nav-item">
            <a href="/dashboard" class="nav-link">Teste</a>
        </li>

        <li class="nav-item">
            <form action="/logout" method="POST">
                @csrf 
                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                this.closest('form').submit();">Sair</a>
            </form>
        </li>
        @endauth
        @guest
        <div class="button-enter"><!--Botões de entrar e registrar do cabeçalho-->
            <a href="/login">Entrar</a><!--Botões de entrar que redireciona o usuario para o login.html-->
            <a href="/register"><button>Registre-se</button></a><!--Botões de registrar que redireciona o usuario para o cadastro.html-->
        </div>
        @endguest
    </header>
    <!--Meio do formulario se inicia aqui-->
    <div class="container">
        <div class="box">
   <main class="conteudo">
    <form action="/welcome/store" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="conteudo-principal">
            <div clas="conteudo-principal-escrito">
                <label class="escategoria">Escolha a categoria:</label>
                <select id="categoria" name="categoria">
                <option selected disabled value="categoria" id="categoria" name="categoria">Selecionar</option>
                <option id="categoria" name="categoria">Roupa</option>
                <option id="categoria" name="categoria">Eletrodoméstico</option>
                <option id="categoria" name="categoria">Alimento</option>
                </select>
            </div>
            
            <a class="titu">Título:<input type="text" class="title" name="title" id="title" bgcolor: "black" ;></input></a>
            <p2 class="conteudo-p">Descrição:<input type="text" class="description" name="description" id="description"></input></p2>
        </section>

        <section class="conteudo-secundario">
            <h4 class="conteudo-secundario-titulo">Adicionar imagens:</h4>
            <div class="button-adicionar">
                <label for="image">Imagem do produto</label>
                <input type="file" id="image" name="image" class="from-control-file">
            </div>
            <div class="button-finalizar">
            <button type="submit">Finalizar</button>
            </div>
        </section>
        </form>
    </main>
    </div>
    </div>

@endsection