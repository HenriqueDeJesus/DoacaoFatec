<div class="modal fade" id="confirmDeleteModal{{$produto->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{$produto->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white"> <!-- Adicionando classes para cor de fundo vermelha e texto branco -->
                <h5 class="modal-title" id="confirmDeleteModalLabel{{$produto->id}}">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark">Tem certeza que deseja excluir o produto {{$produto->NomeProduto}}?</p> <!-- Adicionando classe para cor do texto preta -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('destroyProduto', ['id' => $produto->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </form>
            </div>
        </div>
    </div>
</div>
