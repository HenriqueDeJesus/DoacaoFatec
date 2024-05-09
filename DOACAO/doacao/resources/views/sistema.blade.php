@extends('layouts.main')

@section('title', 'Doacao')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            <a href="/welcome">Doar</a>
            </l1>
            
            <l1>
            <a href="/">Pedir Doação</a>
            </l1>

            <l1>
            <a href="#">Polos</a>
            </l1>

            <l1>
            <a href="#">Quem Somos</a>
            </l1>
        </nav>

        <div class="button-enter"><!--Botões de entrar e registrar do cabeçalho-->
            <a href="/loginUser">Entrar</a><!--Botões de entrar que redireciona o usuario para o login.html-->
            <a href="/cadastro"><button>Registre-se</button></a><!--Botões de registrar que redireciona o usuario para o cadastro.html-->
        </div>
    </header>

    <div class="container">
        <div class="box">
   <main class="conteudo">
    <div class="doacao-container">
    <div id="cards-container">
        @foreach($doacaos as $doacao)
        <div class="card col-md-3">
            <img src="/img/doacao/{{ $doacao->image }}" alt="{{ $doacao->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $doacao->title }}</h5>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    </main>
    </div>
    </div>
@endsection