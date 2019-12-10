<?php

/* Classe de Contato para integração com BD
 * Autor: Carlos Henrique
 * Data de Criação: 26/11/2019
 * Modificações: 
 *  Data:
 *  Nome:
 *  Modificações:
*/
    
    class ContatoController
    {
        //Construtor
        public function __construct()
        {
            require_once('model/contatoClass.php');
            require_once('model/DAO/contatoDAO.php');
        }
        //Insere
        public function novoContato()
        {
            //Instancia da classe Contato
            $contato = new Contato;
            //Criando o objeto com o dados do Form
            $contato->setNome($_POST['txtnome']);
            $contato->setTelefone($_POST['txttelefone']);
            $contato->setCelular($_POST['txtcelular']);
            $contato->setEmail($_POST['txtemail']);
            //Instancia da classe contatoDAO
            $contatoDAO = new contatoDAO;
            //Chamando o metodo insert e enviando o objeto com todos os dados
            $contatoDAO->insertContato($contato);

        }
        //Atualiza
        public function atualizaContato()
        {

        }
        //Exclui
        public function deletaContato()
        {

        }
        //Lista Contato
        public function listaContato()
        {
            //Instanciando a classe, contato DAO
            $contatoController = new ContatoDAO();
            //Chamando o metodo para selecionar todos os registros
            //O return da variavel ira guardar o return do selectAllContato
            return $contatoController->selectALLContato();

        
        }

        //Busca contato
        public function buscaContato()
        {

        }

    }

?>