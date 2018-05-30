<?php
    require_once('../DAO/funcionarioDAO.php');
   
    class FuncionarioController{
       
        public function salvar($func){
            $funcionarioDAO =  new FuncionarioDAO();
            return $funcionarioDAO->salvar($func);
        }
}
