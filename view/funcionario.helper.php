<?php
    require_once ('../model/funcionario.php');
    require_once ('../controller/funcionario.controller.php');    
   
    if (isset($_GET['action'])){
        $action = $_GET['action'];
        switch($action){
            case 'inserir':
                inserir();
                break;
    
            case 'buscar':
                pegar();
                break;
    
            case 'excluir':
                excluir();
                break;
    
            default:
        }
    }  
    
    function inserir(){
        $nome = $_POST['nome_funcionario'];
        $email = $_POST['email_funcionario'];
        $cargo = $_POST['cargo_funcionario'];
        $funcionario = new Funcionario($nome,$email,$cargo);
        $funcionarioController = new FuncionarioController();
        $resultado = $funcionarioController->salvar($funcionario);
        echo json_encode($resultado);
    }
























