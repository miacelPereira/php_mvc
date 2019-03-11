<?php
/*
        Projeto: Exercicio de MVC
        Autor: Micael Pereira dos Santos
        Data de criação: 11-03-2019
        Objetivo: Controlar as rotas dos arquivos
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

                        case 'ATUALIZAR':

                        case 'EXCLUIR':

                        case 'BUSCAR':
                    }
        }

    }
?>