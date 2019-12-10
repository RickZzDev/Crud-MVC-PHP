<?php
/* Classe de Contato para integração com BD
 * Autor: Igor Pereira
 * Data de Criação: 26/11/2019
 * Modificações: 
 *  Data:
 *  Nome:
 *  Modificações:
*/

class ContatoDAO
{
    private $conexaoMysql;
    private $conexao;
    
    //Construtor
    public function __construct()
    {
        //Import da classe de conexão
        require_once('conexaoMysql.php'); 
        require_once('model/contatoClass.php');
        //Instancia do objeto de conexão
        $this->conexaoMysql = new ConexaoMySql();
        
        //Abre a conexão com a BD
        $this->conexao = $this->conexaoMysql->connectDatabase();
        
    }
    
    //Insere um novo contato
    public function insertContato(Contato $contato)
    {
       $sql = "insert into tblcontatos(nome,telefone,celular,email) values (?,?,?,?)";
       //conectando e preparando o Sql pra rodar no banco
       $statement = $this->conexao->prepare($sql);
        //pegando os dados que chegaram do form
       $statementDados = array(
           $contato->getNome(),
           $contato->getTelefone(),
           $contato->getCelular(),
           $contato->getEmail()
       );
       //executando no banco
       if($statement->execute($statementDados))
            echo 'Registro inserido com sucesso';
        else
        {
            echo 'Erro ao executar o script no banco';

        }
            
            
    }
    
    //Altera um contato
    public function updateContato()
    {
        
    }
    
    ///Apaga um contato
    public function deleteContato()
    {
        
    }
    
    //Lista contato
    public function selectALLContato()
    {
        $sql = "select * from tblcontatos";

        $select = $this->conexao->query($sql);

        //Criando um contador
        $cont = 0;
        //dizendo como o PDO nos deve retornar o dado do banco
        //O while ira criar varios objetos para guardar o que retorna do banco
        while($rs = $select->fetch(PDO::FETCH_ASSOC))
        {
            //Instancia da classe Contato, criando uma coleção de objetos
            //o indice é para diferenciar os objetos a cada loopada
            $listContato[] = new Contato;
            $listContato[$cont]->setCodigo($rs['codigo']);
            $listContato[$cont]->setNome($rs['nome']);
            $listContato[$cont]->setTelefone($rs['telefone']);
            $listContato[$cont]->setCelular($rs['celular']);
            $listContato[$cont]->setEmail($rs['email']);
            $cont++;
        }

        return $listContato;
    }
    
    //Busca por ID em contato
    public function selectByIdContato()
    {
        
    }
}


?>