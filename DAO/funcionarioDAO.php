<?php
    require_once('ACrudDAO.php');
    class FuncionarioDAO extends ACrudDAO{
        function salvar($funcionario){
			$situacao['resposta'] = TRUE;
			try{
				$this->conectar();
				if($funcionario->getId() == null){
					$query = "INSERT INTO tb_funcionario(nome_funcionario, email_funcionario, cargo_funcionario) VALUES ('{$funcionario->getNome()}','{$funcionario->getEmail()}','{$funcionario->getCargo()}')";
                    $result = $this->conexao->query($query);
                    if (!$result) {
                        $message  = 'Invalid query: ' . mysqli_error($this->conexao) . "\n";
                        $message .= 'Whole query: ' . $query;
                        die($message);
                    }
                    $id = $this->conexao->insert_id;
                    $funcionario->setId($id);
				}else{
					$alteraendereco = $enderecoDAO->salvar($funcionario->getEndereco());
					$query = "UPDATE tbcliente SET nmcliente='{$funcionario->getNmcliente()}', cpfcliente='{$funcionario->getCpf()}', telcliente='{$funcionario->getTelefone()}', emailcliente='{$funcionario->getEmail()}' WHERE cdcliente='{$funcionario->getIdCliente()}'";
					$this->conexao->query($query);
				}
				$this->desconectar();
			}catch(Exception $ex){
				$situacao['resposta'] = FALSE;
				$situacao['mensagem'] =  $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
            if($situacao['resposta']){
                $situacao['mensagem'] = 'Funcionario salvo com sucesso';
            }
			return $situacao;
        }
        
        function excluir($objeto){}
		function listar(){}
		function buscarPorId($codigo){}
    }
    