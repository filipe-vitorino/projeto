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
}
