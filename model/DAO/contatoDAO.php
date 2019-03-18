<?php
    /*
        Projeto: Exercicio de MVC
        Autor: Micael Pereira dos Santos
        Data de criação: 11-03-2019
        Objetivo: CRUD da classe de contatos
        Alterações no arquivo: 1
        Data de alteração: 18-03-2019
    */

    class ContatoDAO{

        public function __construct(){
            //Quando a essa classe for instânciada, já irá importar a biblioteca do banco de dados
            require_once('conexaoMySQL.php');

        }

        public function insert(Contato $contato){
            // Inserir um contato no banco
            // Informar o tipo e depois o nome do objeto nos parâmetros

            //Formando a string que irá ser inserida no banco de dados
            $sql = "INSERT INTO tbl_contatos (nome, email, telefone, celular, data_nascimento, obs) VALUES ('".$contato->getNome()."','".$contato->getEmail()."','".$contato->getTelefone()."','".$contato->getCelular()."', '".$contato->getDatanascimento()."','".$contato->getObservacao()."');" ;
            //Instânciando o banco de dados e chamando o método que abre a conexão com o banco de dados
            $conex = new ConexaoMySQL();
            $PDO_conex = $conex->connectDatabase();

            //Chamando o método query para a string ser executada no banco de dados
            if($PDO_conex->query($sql)){
                header('location:index.php');
            }else{
                echo('Erro no modo de inserir o contato.');
            }

            //Fechando a conexão com o banco
            $conex->closeDatabase();


        }

        public function delete(){
            // Excluir um contato no banco

        }

        public function update(){
            // Atualizar um contato no banco

        }

        public function selectAll(){
            // Selecionar todos contatos do banco
            $sql = 'SELECT * FROM tbl_contatos';
            
            //Instânciando o objeto de conexão
            $conex = new ConexaoMySQL();

            //Usando o método que realiza a conexão com o banco
            $PDO_conex = $conex->connectDatabase();

            //Executando o select no banco
            $select = $PDO_conex->query($sql);
            
            //Variavel que será usada no controle do array de contatos
            $cont = 0;

            //Criando uma forma para que o select sejam transferidos para a view
            while($rsContatos=$select->fetch(PDO::FETCH_ASSOC)){
                
                //Criando um array do objeto Contato
                $listContatos[] = new Contato();
                
                //Guardando os dados
                $listContatos[$cont]->setNome($rsContatos['nome']);
                $listContatos[$cont]->setTelefone($rsContatos['telefone']);
                $listContatos[$cont]->setCelular($rsContatos['celular']);
                $listContatos[$cont]->setEmail($rsContatos['email']);
                $listContatos[$cont]->setDatanascimento($rsContatos['data_nascimento']);
                $listContatos[$cont]->setObservacao($rsContatos['obs']);
                
                $cont++;
            }
            $conex->closeDatabase();
            
            return $listContatos;
        }

        public function selectById(){
            // Selecionar um contato do banco pelo ID

        }
        
    }
?>