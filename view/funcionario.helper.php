<?php
    require_once ('../model/funcionario.php');
    require_once ('../controller/funcionario.controller.php');    
   
    if (isset($_GET['action'])){
        $action = $_GET['action'];
        switch($action){
            case 'inserir':
                inserir();
                break;
    
            case 'listar':
                listar();
                break;
    
            case 'excluir':
                excluir();
                break;
            case 'busca_id':
                busca_id();
                break;
            default:
        }
    }  
    
    function inserir(){
        $id_funcionario = $_POST['id_funcionario'];
        $nome = $_POST['nome_funcionario'];
        $email = $_POST['email_funcionario'];
        $cargo = $_POST['cargo_funcionario'];
        $funcionario = new Funcionario($nome,$email,$cargo);
        if($id_funcionario != 0){
            $funcionario->setId($id_funcionario);
        }
        $funcionarioController = new FuncionarioController();
        $resultado = $funcionarioController->salvar($funcionario);
        echo json_encode($resultado);
    }
    function listar(){
        $cont = 1;
        $teste = "[";
        $aux="";
        $funcionarioController = new FuncionarioController();
        $resultado = $funcionarioController->listar();
        foreach ($resultado as $objeto) {
            $aux = $objeto->jsonSerialize();
            if($cont){
                $teste .=json_encode($aux);
                $cont = 0;       
            }else{
                $teste .=",".json_encode($aux);
            }
        }
        $teste .= "]";
        echo $teste;
    }
    function excluir(){
        $id_funcionario = $_POST['id_funcionario'];
        //$funcionario = new Funcionario($nome,$email,$cargo);
        $funcionarioController = new FuncionarioController();
        $resultado = $funcionarioController->excluir($id_funcionario);
        echo json_encode($resultado);
    }

    function busca_id(){
        $id_funcionario = $_POST['id_funcionario'];
        //$funcionario = new Funcionario($nome,$email,$cargo);
        $funcionarioController = new FuncionarioController();
        $resultado = $funcionarioController->busca_id($id_funcionario);
        $saida  = $resultado->jsonSerialize();
        echo json_encode($saida);
    }






















