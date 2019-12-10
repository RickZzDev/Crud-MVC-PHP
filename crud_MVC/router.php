<?php
    $controller  = $_GET['controller'];
    $modo = $_GET['modo'];

    switch(strtoupper($controller))
    {
        case 'CONTATOS';
            require_once('controller/contatoController.php');

            switch(strtoupper($modo))
            {
                case 'NOVO':
                    //Instacia a controller
                    $contatoController = new contatoController();
                    //Metodo da controller que insere um novo contato
                    $contatoController->novoContato();
                    break;
                case 'EDITAR':

                case 'EXCLUIR';
            }
              
            
            

    }
?>