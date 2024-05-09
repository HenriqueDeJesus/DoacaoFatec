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
                    <div class="card-header">{{ __('Cadastro de Polos') }}</div>

                    <div class="card-body">
                    <form class="form" method="post" action="/loginfuncionario/cadastro-polo">
                        @csrf
                      
                            <!-- Campos do formulário -->
                            <div class="form-group">
                                <label for="polo">Nome do Polo:</label>
                                <input type="text" name="polo" id="polo" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="logradouro">Rua:</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="NumeroCasa">Numero da Casa:</label>
                                <input type="text" name="NumeroCasa" id="NumeroCasa" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="bairro">Bairro:</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade:</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <input type="text" name="estado" id="estado" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="cep">CEP:</label>
                                <input type="text" name="cep" id="cep" class="form-control" required>
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