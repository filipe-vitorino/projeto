$(document).ready(function(){ 
    listar_funcionarios();

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
        alert(resultado);
        console.log(resultado);
    } 
    function falha(){
        console.log("Erro");
    }
}

function listar_funcionarios(){
    $.ajax({
        url: "funcionario.helper.php?action=listar"
    }).then(sucesso, falha);   

    function sucesso(resultado){
        alert(resultado);
        var table = $("#table tbody");
        resultado = JSON.parse(resultado);
        alert(resultado);
        $.each(resultado, function(idx, elem){
            table.append("<tr><td>"+elem.id_funcionario+"</td><td>"+elem.nome_funcionario+"</td><td>"+elem.email_funcionario+"</td><td>"+elem.cargo_funcionario+"</td>"+
            "<td><button type='button' class='btn btn-sm my-0 btn-outline-warning btn-rounded'><i class='fas fa-user-edit'></i></button>"+
                " <button type='button' class='btn btn-sm my-0 btn-outline-danger btn-rounded'><i class='fas fa-user-minus'></i></button></td>"+ 
            +"</tr>");
        });
    } 
    function falha(){
        console.log("Erro");
    }
}

