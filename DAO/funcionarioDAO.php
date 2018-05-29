<?php
    require_once('ACrudDAO.php');
    class FuncionarioDAO extends ACrudDAO{
        function salvar($funcionario){
			$situacao = TRUE;
			try{
				$this->conectar();
				if($funcionario->getId() == null){
					$query = "INSERT INTO tb_funcionario(nome_funcionario, email_funcionario, cargo_funcionario) VALUES ('{$funcionario->getNome()}','{$funcionario->getEmail()}','{$funcionario->getCargo()}')";
					$this->conexao->query($query);
					$id = $this->conexao->insert_id;
					$funcionario->setId($id);
				}else{
					$alteraendereco = $enderecoDAO->salvar($funcionario->getEndereco());
					$query = "UPDATE tbcliente SET nmcliente='{$funcionario->getNmcliente()}', cpfcliente='{$funcionario->getCpf()}', telcliente='{$funcionario->getTelefone()}', emailcliente='{$funcionario->getEmail()}' WHERE cdcliente='{$funcionario->getIdCliente()}'";
					$this->conexao->query($query);
				}
				$this->desconectar();
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			echo $situacao;
        }
        
        function excluir($objeto){}
		function listar(){}
		function buscarPorId($codigo){}
    }
    