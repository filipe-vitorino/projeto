$(document).ready(function(){ 
    listar_funcionarios();

    $('#btn-novo').click(function (event) {
        event.preventDefault();
        $('#id_funcionario').val(0);
        $('#nome_funcionario').val('');
        $('#email_funcionario').val('');
        $('#cargo_funcionario').val('');
        $('#exampleModalCenter').modal('show') 
    });

    $('#btn_salvar').click(function( event ) {    
        event.preventDefault();
       // $('#formulario_funcionario').submit();
        inserir_funcionario();
    });
});

function inserir_funcionario(){
    var form = $('#formulario_funcionario').serialize();
    alert(form);
    $.ajax({
        type: 'POST',
        data: form,
        url: "funcionario.helper.php?action=inserir"
    }).then(sucesso, falha);   

    function sucesso(resultado){
        alert(resultado);
        console.log(resultado);
        $('#exampleModalCenter').modal('hide');
        listar_funcionarios();
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
        //alert(resultado);
        var table = $("#table tbody");
        resultado = JSON.parse(resultado);
        //alert(resultado);
        //table.clean();
        $("#table tbody").empty();
        $.each(resultado, function(idx, elem){
            table.append("<tr><td><b>"+elem.id_funcionario+"</b></td><td>"+elem.nome_funcionario+"</td><td>"+elem.email_funcionario+"</td><td>"+elem.cargo_funcionario+"</td>"+
            "<td><button id='btn-alterar' type='button' onClick='alterar("+elem.id_funcionario+")'class='btn btn-sm my-0 btn-outline-warning btn-rounded'><i class='fas fa-user-edit'></i></button>"+
                " <button id='btn-deletar' type='button' onClick='deletar("+elem.id_funcionario+")'  value='"+elem.id_funcionario+"' class='btn btn-sm my-0 btn-outline-danger btn-rounded'><i class='fas fa-user-minus'></i></button></td>"+ 
            +"</tr>");
        });
    } 
    function falha(){
        console.log("Erro");
    }
}

function deletar(id_funcionario){
    //alert(id_funcionario);
    var dado = 'id_funcionario='+id_funcionario;
    $.ajax({
        type: 'POST',
        data: dado,
        url: "funcionario.helper.php?action=excluir"
    }).then(sucesso, falha);   

    function sucesso(resultado){
        alert(resultado);
        console.log(resultado);
        listar_funcionarios();
    } 
    function falha(){
        console.log("Erro");
    }
}


function alterar(id_funcionario){
    //alert(id_funcionario);
    var dado = 'id_funcionario='+id_funcionario;
    $.ajax({
        type: 'POST',
        data: dado,
        url: "funcionario.helper.php?action=busca_id"
    }).then(sucesso, falha);   

    function sucesso(resultado){
        //alert(resultado);
        console.log(resultado);
        resultado = JSON.parse(resultado)
        $('#id_funcionario').val(resultado.id_funcionario);
        $('#nome_funcionario').val(resultado.nome_funcionario);
        $('#email_funcionario').val(resultado.email_funcionario);
        $('#cargo_funcionario').val(resultado.cargo_funcionario);        
        var form = $('#formulario_funcionario').serialize();        
        alert(form);
        $('#exampleModalCenter').modal('show');
        
        listar_funcionarios();
    } 
    function falha(){
        console.log("Erro");
    }
}

