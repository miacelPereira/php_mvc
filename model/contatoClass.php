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

        public function __get($att){
            // Getter dos atributos
            return $this->att;
        }

        public function __set($att, $value){
            // Setter dos atributos
            $this->att = $value;
        }
    }
?>
