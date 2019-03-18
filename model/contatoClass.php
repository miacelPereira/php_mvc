<?php
     /*
        Projeto: Exercicio de MVC
        Autor: Micael Pereira dos Santos
        Data de criação: 11-03-2019
        Objetivo: Classe de contatos
    */

    class Contato{
        // Classe do OBJETO contato
        // Atributos
        private $codigo;
        private $nome;
        private $email;
        private $telefone;
        private $celular;
        private $data_nascimento;
        private $obs;

        public function __construct(){

        }
        
        //Setters
        public function setNome($att){
            $this->nome = $att;
        }

        public function setTelefone($att){
            $this->telefone = $att;
        }

        public function setCelular($att){
            $this->celular = $att;
        }

        public function setEmail($att){
            $this->email = $att;
        }

        public function setDatanascimento($att){
            $this->data_nascimento = date("Y-m-d", strtotime($att));
        }

        public function setObservacao($att){
            $this->obs = $att;
        }
        
        //Getters
        public function getNome(){
            return $this->nome;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getDatanascimento(){
            return $this->data_nascimento;
        }

        public function getObservacao(){
            return $this->obs;
        }
    }
?>
