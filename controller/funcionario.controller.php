<?php
    require_once('../DAO/funcionarioDAO.php');
   
    class FuncionarioController{
       
        public function salvar($func){
            $funcionarioDAO =  new FuncionarioDAO();
            return $funcionarioDAO->salvar($func);
        }
        public function listar(){
            $funcionarioDAO =  new FuncionarioDAO();
            return $funcionarioDAO->listar();
        }
        public function excluir($id_funcionario){
            $funcionarioDAO =  new FuncionarioDAO();
            return $funcionarioDAO->excluir($id_funcionario);
        }
        public function busca_id($id_funcionario){
            $funcionarioDAO =  new FuncionarioDAO();
            return $funcionarioDAO->busca_id($id_funcionario);
        }

    }
