<?php
	class BancoDados
	{
		private $conexao;

		function __construct(){
			try{
				header('Content-Type: text/html; charset=utf-8');
				$this->conexao = new mysqli("localhost", "root", "", "php");
				$this->conexao->query("SET NAMES 'utf8'");
				$this->conexao->query('SET character_set_connection=utf8');
				$this->conexao->query('SET character_set_client=utf8');
				$this->conexao->query('SET character_set_results=utf8');
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
		}

		function getConexao(){
			return $this->conexao;
		}
	}
?>
