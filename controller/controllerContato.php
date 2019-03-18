<?php
     /*
        Projeto: Exercicio de MVC
        Autor: Micael Pereira dos Santos
        Data de criação: 11-03-2019
        Objetivo: Controle de contato
        Alterações no arquivo: 1
        Data de alteração: 18-03-2019
    */
    class ControllerContato{

        public function __construct(){
            //Import da classe de contato
            require_once('model/contatoClass.php');

            //Importando a classe contatoDAO pois é ela que faz alterações no banco de dados
            require_once('model/DAO/contatoDAO.php');

        }
    
        public function inserirContato(){
            //Inserir contato
            //Esse if é para verificar se o method que chegou aqui é POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nome = $_POST['txtnome'];
                $telefone = $_POST['txttelefone'];
                $celular = $_POST['txtcelular'];
                $email = $_POST['txtemail'];
                $datanascimento = $_POST['txtdatanasc'];
                $observacao = $_POST['txtobs'];

                //Instância da classe de contato
                $contato = new Contato();

                // Settando os valores
                $contato->setNome($nome);
                $contato->setTelefone($telefone);
                $contato->setCelular($celular);
                $contato->setEmail($email);
                $contato->setDatanascimento($datanascimento);
                $contato->setObservacao($observacao);

                //Instância da classe contatoDAO
                $contatoDAO = new ContatoDAO();

                //Passando o contato para a classe DAO para ela realizar o insert no banco
                $contatoDAO->insert($contato);
                
            }else{
                echo('Erro em salvar os dados!</br> Para o técnico: Valores não foram passados para a controller ou passados de forma incorreta.');
            }
        }
    
        public function excluirContato(){
            //Excluir contato
        }
    
        public function atualizarContato(){
            //Atualizar contato
        }
    
        public function listarContatos(){
            //Listar contatos

            //Instância do objeto DAO
            $listContatoDAO = new ContatoDAO();

            //Usando o método que retorna todos os contatos do banco de dados e retornando para a view
            return $listContatoDAO->selectAll();
        }
    
        public function buscarContato(){
            //Buscarcontato
        }
    }

    
?>