<?php
    require_once('ACrudDAO.php');
    require_once('../model/funcionario.php');
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
		function listar(){
            $funcionarios = array();
			try{
				$this->conectar();
				$query = "SELECT * FROM tb_funcionario";
				$resultado = $this->conexao->query($query);
				$this->desconectar();
				while($registro = mysqli_fetch_assoc($resultado)) {
					$nome = $registro['nome_funcionario'];
					$email = $registro['email_funcionario'];
                    $cargo = $registro['cargo_funcionario'];
                    $funcionario = new Funcionario($nome,$email,$cargo);
                    $funcionario->setId($registro['id_funcionario']);
                    $funcionarios[] = $funcionario;
				}
				$resultado->close();
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
            //print_r($funcionarios);
			return $funcionarios;
        }
		function buscarPorId($codigo){}
    }
    