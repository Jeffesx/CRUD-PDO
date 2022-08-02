<?php

// definir as constantes da conexao
define("server", "mysql:host=localhost;dbname=bd_os");
define("usuario", "root");
define("senha","");


class Os{
    // atributos da classe
    public $ID;
    public $STATUS_OS;
    public $DATA_ABERTURA;
    public $HORA_ABERTURA;
    public $DATA_FECHAMENTO;
    public $HORA_FECHAMENTO;
    public $TITULO;
    public $CATEGORIA;
    public $CLIENTE;
    public $TECNICO_EXECUTANTE;
    public $DESCRICAO;
    public $RESOLUCAO;
    


    public function __construct($id = null, $status_os= null, $data_abertura= null, $hora_abertura= null, $data_fechamento = null, $hora_fechamento = null, $titulo = null, $categoria = null, $cliente = null, $tecnico_executante = null, $descricao = null, $resolucao = null)
    {
        $this->ID = $id;
        $this->STATUS_OS = $status_os;
        $this->DATA_ABERTURA = $data_abertura;
        $this->HORA_ABERTURA = $hora_abertura;
        $this->DATA_FECHAMENTO = $data_fechamento;
        $this->HORA_FECHAMENTO = $hora_fechamento;
        $this->TITULO = $titulo;
        $this->CATEGORIA = $categoria;
        $this->CLIENTE = $cliente;
        $this->TECNICO_EXECUTANTE = $tecnico_executante;
        $this->DESCRICAO = $descricao;
        $this->RESOLUCAO = $resolucao;
    }

    // metodo listar todas as categorias
    public function listarOs(){
        // criar a conexao com o PDO
        $con = new PDO(server,usuario,senha);

        // comando sql para selecionar o usuario
        $sql = $con->prepare("select * from os;");
        // executar o comando
        $sql->execute();

        // testar se o comando retornou resultado
        if($sql->rowCount() > 0 ){
            return $result = $sql->fetchAll(PDO::FETCH_CLASS);
        }


    }

     public function listarEmpresa(){
        // criar a conexao com o PDO
        $con = new PDO(server,usuario,senha);

        // comando sql para selecionar o usuario
        $sql = $con->prepare("select * from empresa;");
        // executar o comando
        $sql->execute();

        // testar se o comando retornou resultado
        if($sql->rowCount() > 0 ){
            return $result = $sql->fetchAll(PDO::FETCH_CLASS);
        }


    }

         public function listarCategoria(){
        // criar a conexao com o PDO
        $con = new PDO(server,usuario,senha);

        // comando sql para selecionar o usuario
        $sql = $con->prepare("select * from categoria;");
        // executar o comando
        $sql->execute();

        // testar se o comando retornou resultado
        if($sql->rowCount() > 0 ){
            return $result = $sql->fetchAll(PDO::FETCH_CLASS);
        }


    }
     public function listarClientes(){
        // criar a conexao com o PDO
        $con = new PDO(server,usuario,senha);

        // comando sql para selecionar o usuario
        $sql = $con->prepare("select * from clientes;");
        // executar o comando
        $sql->execute();

        // testar se o comando retornou resultado
        if($sql->rowCount() > 0 ){
            return $result = $sql->fetchAll(PDO::FETCH_CLASS);
        }


    }
     public function listarTecnicos(){
        // criar a conexao com o PDO
        $con = new PDO(server,usuario,senha);

        // comando sql para selecionar o usuario
        $sql = $con->prepare("select * from tecnicos;");
        // executar o comando
        $sql->execute();

        // testar se o comando retornou resultado
        if($sql->rowCount() > 0 ){
            return $result = $sql->fetchAll(PDO::FETCH_CLASS);
        }


    }

    // metodo para inserir usuario
    public function inserir(){
        //criar a conexao
        $con = new PDO(server, usuario,senha);

        if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"])) {
            $this->NOME = $_POST["nome"];
            $this->LOGIN = $_POST["login"];
            $this->SENHA = $_POST["senha"];
            //comando sql para inserir o usuario
            $sql = $con->prepare("insert into os(status_os,data_abertura,hora_abertura,data_fechamento,hora_fechamento,titulo,categoria,cliente,tecnico_executante,descricao,resolucao) values (?,?,?,?,?,?,?,?,?,?,?)");
            // executar o comando
            $sql->execute(array($this->NOME, $this->LOGIN, $this->SENHA, 2));

            //testar se o comando deu certo
            if ($sql->rowCount() > 0) {
                header("Location:./"); // retornar para raiz da pasta
            }
        }
    }

    // metodo para excluir o usuario
    public function excluir($id){
        //criar a conexao
        $con = new PDO(server,usuario,senha);

        $this->ID = $id;
        //comando sql para excluir o usuario
        $sql = $con->prepare("delete from os where id = ?");
        //executar o comando
        $sql->execute(array($this->ID));

        //testar se o comando deu certo
        if($sql->rowCount() > 0){
            header("Location:./"); //retornar a raiz da pasta
        }


    }

    // função para retornar o usuario pelo ID
    public function listarID($id){
        // criar a conexao
        $con = new PDO(server,usuario,senha);

        $this->ID = $id;
        //comando para selecionar o usuario pelo id
        $sql = $con->prepare("select * from os where id = ?");
        $sql->execute(array($this->ID));
        //testar se o comando deu certo
        if($sql->rowCount() > 0){
            return $result = $sql->fetchObject(); // como retorna apenas um valor utilizar fetchObject
        }
    }

    // funcao para alterar os dados do usuario
    public function alterar(){
        //criar a conexao
        $con = new PDO(server,usuario,senha);

        if(isset($_POST["salvar"])){
           
            $this->ID = $_GET["id"];
            $this->STATUS_OS = $_POST["status_os"];
            $this->DATA_ABERTURA = $_POST["data_abertura"];
            $this->HORA_ABERTURA = $_POST["hora_abertura"];
            $this->DATA_FECHAMENTO= $_POST["data_fechamento"];
            $this->HORA_FECHAMENTO = $_POST["hora_fechamento"];
            $this->TITULO = $_POST["titulo"];
            $this->CATEGORIA = $_POST["categoria"];
            $this->CLIENTE= $_POST["cliente"];
            $this->TECNICO_EXECUTANTE = $_POST["tecnico_executante"];
            $this->DESCRICAO = $_POST["descricao"];
            $this->RESOLUCAO = $_POST["resolucao"];


            // comando sql para alterar o usuario
            $sql = $con->prepare("update os set status_os = ?, data_abertura = ?, hora_abertura = ?, data_fechamento = ?, hora_fechamento = ?, titulo = ?, categoria = ?, cliente = ?, tecnico_executante = ?, descricao = ?, resolucao = ? where id =?");
            $sql->execute(array($this->STATUS_OS, $this->DATA_ABERTURA, $this->HORA_ABERTURA,$this->DATA_FECHAMENTO,$this->HORA_FECHAMENTO,$this->TITULO,$this->CATEGORIA,$this->CLIENTE,$this->TECNICO_EXECUTANTE,$this->DESCRICAO,$this->RESOLUCAO,$this->ID));

            //testar se o comando deu certo
            if($sql->rowCount() > 0){
                header("Location:./"); // retornar para a raiz da pasta
            }

        }
    }




}











?>