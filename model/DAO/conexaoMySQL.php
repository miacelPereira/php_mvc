<?php

    /*
        Projeto: Exercicio de MVC
        Autor: Micael Pereira dos Santos
        Data de criação: 11-03-2019
        Objetivo: Classe feita para efetuar a conexão com o banco de dados MySql
    */

    class ConexaoMySQL{
        private $server;
        private $user;
        private $password;
        private $database;

        public function __construct(){
            $this->server = "localhost";
            $this->user = "root";
            $this->password = "bcd127";
            $this->database = "dbcontatos20181";
        }

        public function connectDatabase(){
            //Abrir a conexão com o banco de dados
            try{
                $conexao = new PDO('msql:host='. $this->server.'; dbname='.$this->database, $this->user, $this->password);
                return $conexao;
            }catch(PDOException $erro){
                echo ('Erro na porra toda! \(°0°)/.
                        <br> Identificação do erro: <br>
                            Linha = '.$erro->getLine().'<br>
                            Mensagem = '.$erro.getMessage());
            }
        }

        public function closeDatabase(){
            //Fechar a conexão com o banco de dados
            $conexao = null;
        }

    }
?>