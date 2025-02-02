<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | DOAÇÃO</title>
    <style>
        body{
            background: linear-gradient(263.42deg, #FF0A67 1.87%, #F57B67 100%);
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .botaoEnviar{
            background: white;
            width: 50%;
            border-radius: 30px;
            padding: 15px;
            color: black;
            border: 0px;
            outline: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DOAÇÃO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <br>
    <div class="box-search">
    <form action="/loginfuncionario/dashboard" method="GET">
        <input type="text" class="form-control w-25" placeholder="Pesquisar" id="search" name="search">
    </form>
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    @if($search)
    <h2>Produto: {{$search}}</h2>
    @else
    <h2></h2>
    @endif
    @include('includes.mensagens')
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!--<th scope="col">Status</th>-->
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tipo</th>
                    <!--<th scope="col">Polo</th>
                    <th scope="col">Endereço</th>-->
                    <th scope="col">...</th>
                    <th scope="col">Operação</th>
                    <th scope="col">Operação</th>
                </tr>
            </thead>
            <tbody>
            @if($produtos->count() > 0)
            @foreach($produtos as $produto)
            @if($produto->Status === 'Disponivel')
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $produto->NomeProduto }}</td>
                        <td class="align-middle">{{ $produto->Categoria }}</td>
                        <td class="align-middle">{{ $produto->Status }}</td>  
                        <td class="align-middle">
                        <a class='btn btn-sm btn-primary' href="/loginfuncionario/editar-produto/{{ $produto->id }}" title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 

                            <a href="#confirmDeleteModal{{$produto->id}}" class='btn btn-sm btn-danger' title='Deletar' >
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            @include('modalproduto.delete')
                        </td>
                         <td><a href='/loginfuncionario/cadastro-doacao/{{ $produto->id }}' class='btn btn-success'>Doar</a></td>
                         <td><a href='/loginfuncionario/cadastro-reserva/{{ $produto->id }}' class='btn btn-warning'>Reservar Item</a></td>
                    </tr>
                    @endif
                @endforeach
            @endif
            @if($produtos->count() == 0 && $search)
                <p>Não foi possivel encontrar {{$search}}</p>
            @endif
            </tbody>
        </table>
    </div>
    <a href="/loginfuncionario/sistemareservar" class="botaoEnviar">Itens Reservados</a>
    <a href="/loginfuncionario/cadastro-produto" class="botaoEnviar">Cadastrar Produto</a> 
    <a href="/loginfuncionario/sistemadoados" class="botaoEnviar">Itens Doados</a>

    @if(auth()->guard('funcionario')->check())
        @if(auth()->guard('funcionario')->user()->Tipo === 'Administrador')
            <a href="/loginfuncionario/polos" class="botaoEnviar">Polos</a>
            <a href="/loginfuncionario/funcionarios" class="botaoEnviar">Funcionarios</a> 
            @endif
    @endif
    <br/>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('a[href^="#"]').on('click', function(e){
            e.preventDefault();
            var target = $(this).attr('href');
            $(target).modal('show');
        });
    });
</script>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
<script src="personalizado.js"></script>	
</html>
