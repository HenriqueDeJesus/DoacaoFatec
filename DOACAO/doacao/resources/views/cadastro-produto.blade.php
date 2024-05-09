<!-- resources/views/cadastro-funcionario.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Produtos') }}</div>

                    <div class="card-body">
                    <form class="form" method="post" action="/loginfuncionario/cadastro-produto" enctype="multipart/form-data">
                        @csrf
                      
                            <!-- Campos do formulário -->
                            <div class="form-group">
                                <label for="produto">Nome do Produto:</label>
                                <input type="text" name="produto" id="produto" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <input type="text" name="categoria" id="categoria" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Imagem:</label>
                                <input type="file" id="image" name="image" class="from-control-file">
                            </div>

                            <div class="form-group">
                                <label for="polo_id">Polo:</label>
                                <select name="polo_id" id="polo_id" class="form-control" required>
                                    <option value="">Selecione um polo</option>
                                    <!-- Loop para exibir os polos disponíveis -->
                                    @foreach($polos as $polo)
                                        <option value="{{ $polo->id }}">{{ $polo->NomePolo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Adicione os outros campos do formulário aqui -->

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>