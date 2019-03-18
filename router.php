<?php
/*
        Projeto: Exercicio de MVC
        Autor: Micael Pereira dos Santos
        Data de criação: 11-03-2019
        Objetivo: Controlar as rotas dos arquivos
        Alterações no arquivo: 2
        Data de alteração: 15-03-2019 e 18-03-2019
             

    */
    $controller = null;
    $modo = null;

    if(isset($_GET['controller'])){
        //Sempre serão enviadas pelas View, seja nas ações de inserir, pesquisar, excluir, etc.
        $controller = strtoupper($_GET['controller']);
        $modo = strtoupper($_GET['modo']);

        switch($controller){
            case 'CONTATOS':
                switch($modo){
                    case 'INSERIR':
                        require_once('controller/controllerContato.php');
                        
                        //Instânciando o objeto no PHP
                        $controllerContato = new ControllerContato; 
                        
                        //Utilizando um método que está na classe ControllerContato
                        $controllerContato -> inserirContato();
                        break;
                    case 'ATUALIZAR':
                        echo('100% atualizado');
                        break;
                    case 'EXCLUIR':

                    case 'BUSCAR':
                }
                break;
            case 'PRODUTOS':

                break;
            case 'CLIENTES':

                break;
        }

    }
?>