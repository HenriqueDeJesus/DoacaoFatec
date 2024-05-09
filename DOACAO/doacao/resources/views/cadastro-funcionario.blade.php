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
                    <div class="card-header">{{ __('Cadastro de Funcionário') }}</div>

                    <div class="card-body">
                    <form class="form" method="post" action="/loginfuncionario/cadastro-funcionario">
                        @csrf
                      
                            <!-- Campos do formulário -->
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="datanascimento">Data:</label>
                                <input type="date" name="datanascimento" id="datanascimento" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="salario">Salario:</label>
                                <input type="text" name="salario" id="salario" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="emai">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="telefone">telefone:</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="cargo">cargo:</label>
                                <input type="text" name="cargo" id="cargo" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipo">Tipo:</label>
                                <input type="tipo" name="tipo" id="tipo" class="form-control" required>
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