<?php
    class Funcionario{
        private $id_funcionario;
        private $nome_funcionario;
        private $email_funcionario;
        private $cargo_funcionario;

        function __construct($nome, $email, $cargo){
           // sleep(10000);
            $this->nome_funcionario = $nome;
            $this->email_funcionario = $email;
            $this->cargo_funcionario = $cargo;
        }

        public function getId(){
            return $this->$id_funcionario;
        }
        public function setId($id){
            $this->$id_funcionario = $id;
        }

        public function getNome(){
            return $this->$nome_funcionario;
        }
        public function setNome($nome){
            $this->$nome_funcionario = $nome;
        }

        public function getEmail(){
            return $this->$email_funcionario;
        }
        public function setEmail($email){
            $this->$email_funcionario = $email;
        }
        public function getCargo(){
            return $this->$cargo_funcionario;
        }
        public function setCargo($cargo){
            $this->$cargo_funcionario = $cargo;
        }
    }
    






