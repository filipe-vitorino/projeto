$(document).ready(function(){ 
    $('#btn_salvar').click(function( event ) {
        
        event.preventDefault();
       // $('#formulario_funcionario').submit();
        inserir_funcionario();
    });
});

function inserir_funcionario(){
    var form = $('#formulario_funcionario').serialize();
    $.ajax({
        type: 'POST',
        data: form,
        url: "funcionario.helper.php?action=inserir"
    }).then(sucesso, falha);   

    function sucesso(resultado){
        alert("AA");
        alert(resultado);
        console.log(resultado);
    } 
    function falha(){
        console.log("Erro");
    }
}
