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

        private $conex;

        public function __construct(){
            //Quando a essa classe for instânciada, já irá importar a biblioteca do banco de dados
            require_once('conexaoMySQL.php');

            //Instânciando o objeto de conexão
            $this->conex = new ConexaoMySQL();

        }

        public function insert(Contato $contato){
            // Inserir um contato no banco
            // Informar o tipo e depois o nome do objeto nos parâmetros

            //Formando a string que irá ser inserida no banco de dados
            $sql = "INSERT INTO tbl_contatos (nome, email, telefone, celular, data_nascimento, obs) VALUES ('".$contato->getNome()."','".$contato->getEmail()."','".$contato->getTelefone()."','".$contato->getCelular()."', '".$contato->getDatanascimento()."','".$contato->getObservacao()."');" ;
    
            $PDO_conex = $this->conex->connectDatabase();

            //Chamando o método query para a string ser executada no banco de dados
            if($PDO_conex->query($sql)){
                header('location:index.php');
            }else{
                echo('Erro no modo de inserir o contato.');
            }

            //Fechando a conexão com o banco
            $this->conex->closeDatabase();


        }

        public function delete($id){
            // Excluir um contato no banco
            $sql = "DELETE FROM tbl_contatos WHERE id =".$id;

            //Mandando o delete para o banco
            //Usando o método que realiza a conexão com o banco
            $PDO_conex = $this->conex->connectDatabase();

            //Mandando o script e tratando os erros do banco
            if($PDO_conex->query($sql)){
                header('location:index.php');
            }else{
                echo('Erro no modo de deletar o contato.');
            }

            //Fechando a conexão com o banco
            $this->conex->closeDatabase();





        }

        public function update(Contato $contato){
            // Atualizar um contato no banco
            $sql = "UPDATE tbl_contatos set nome = '".$contato->getNome()."', email = '".$contato->getEmail()."', telefone = '".$contato->getTelefone()."', celular = '".$contato->getCelular()."', data_nascimento = '".$contato->getDatanascimento()."', obs = '".$contato->getObservacao()."' WHERE id ='".$contato->getCodigo()."';" ;
            
            $PDO_conex = $this->conex->connectDatabase();

            //Chamando o método query para a string ser executada no banco de dados
            if($PDO_conex->query($sql)){
                header('location:index.php');
            }else{
                echo('Erro no modo de atualizar o contato.');
                echo $sql;
            }

            //Fechando a conexão com o banco
            $this->conex->closeDatabase();


        }

        public function selectAll(){
            // Selecionar todos contatos do banco
            $sql = 'SELECT * FROM tbl_contatos';
            
            //Usando o método que realiza a conexão com o banco
            $PDO_conex = $this->conex->connectDatabase();

            //Executando o select no banco
            $select = $PDO_conex->query($sql);
            
            //Variavel que será usada no controle do array de contatos
            $cont = 0;

            //Criando uma forma para que o select sejam transferidos para a view
            while($rsContatos=$select->fetch(PDO::FETCH_ASSOC)){
                
                //Criando um array do objeto Contato
                $listContatos[] = new Contato();
                
                //Guardando os dados
                $listContatos[$cont]->setCodigo($rsContatos['id']);
                $listContatos[$cont]->setNome($rsContatos['nome']);
                $listContatos[$cont]->setTelefone($rsContatos['telefone']);
                $listContatos[$cont]->setCelular($rsContatos['celular']);
                $listContatos[$cont]->setEmail($rsContatos['email']);
                $listContatos[$cont]->setDatanascimento($rsContatos['data_nascimento']);
                $listContatos[$cont]->setObservacao($rsContatos['obs']);
                
                $cont++;
            }
            $this->conex->closeDatabase();
            
            return $listContatos;
        }

        public function selectById($id){
            // Selecionar um contato do banco pelo ID
            $sql = 'SELECT * FROM tbl_contatos where id ='.$id ;
            
            //Usando o método que realiza a conexão com o banco
            $PDO_conex = $this->conex->connectDatabase();

            //Executando o select no banco
            $select = $PDO_conex->query($sql);

             //Criando uma forma para que o select sejam transferidos para a view
             if($rsContatos=$select->fetch(PDO::FETCH_ASSOC)){
                 
                 //Criando um array do objeto Contato
                 $contatos = new Contato();
                 
                 //Guardando os dados
                 $contatos->setCodigo($rsContatos['id']);
                 $contatos->setNome($rsContatos['nome']);
                 $contatos->setTelefone($rsContatos['telefone']);
                 $contatos->setCelular($rsContatos['celular']);
                 $contatos->setEmail($rsContatos['email']);
                 $contatos->setDatanascimento($rsContatos['data_nascimento']);
                 $contatos->setObservacao($rsContatos['obs']);
             }

             $this->conex->closeDatabase();
             
             return $contatos;

        }
        
    }
?>