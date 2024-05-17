$(document).ready(function(){
    $('#cpf').on('change', function(){
        var cpf = $(this).val();
        $.ajax({
            url: '/buscar-usuario-por-cpf',
            type: 'GET',
            data: {cpf: cpf},
            success: function(response){
                if(response.success){
                    $('input[name="user_nome"]').val(response.data.name);
                } else {
                    alert(response.message);
                }
            },
            error: function(){
                alert('Ocorreu um erro ao buscar o usuário.');
            }
        });
    });
});
