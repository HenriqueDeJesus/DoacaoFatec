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
    width: 50%%;
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
            <a class="navbar-brand" href="#">DOAÇÕES RESERVADAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="/loginfuncionario/dashboard" class="btn btn-danger me-5">Retornar</a>
        </div>
    </nav>
    <br>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Polo</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Operação</th>
                </tr>
            </thead>
            <tbody>
            @if($produtos->count() > 0)
            @foreach($produtos as $produto)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $produto->produtoname }}</td>
                        <td class="align-middle">{{ $produto->descricao }}</td>
                        <td class="align-middle">{{ $produto->polo }}</td>
                        <td class="align-middle">{{ $produto->endereco }}</td>
                        <td class="align-middle">{{ $produto->tipo }}</td>
                        <td class="align-middle">{{ $produto->tipo }}</td>
                        <td><a href='/' class='btn btn-success'>Doar</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        
        </div>
          
           </form>
    <br/>
    </div>
</body>
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