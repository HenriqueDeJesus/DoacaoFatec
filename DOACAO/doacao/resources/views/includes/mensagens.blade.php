@if($mensagem = Session::get('sucesso'))
<div class="">
    <div class="card-content white-text">
        <p>{{ $mensagem }}</p>
    </div>
</div>
@endif