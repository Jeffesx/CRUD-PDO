<?php

// definir as constantes da conexao
define("server", "mysql:host=localhost;dbname=bd_os");
define("usuario", "root");
define("senha","");


class Tecnico{
    // atributos da classe
    public $ID;
    public $NOME;
    public $TELEFONE;
    public $EMAIL;
    public $LOGIN;
    public $SENHA;
    


    public function __construct($id = null, $nome= null, $telefone= null,$email= null, $login= null, $senha = null)
    {
        $this->ID = $id;
        $this->NOME = $nome;
        $this->TELEFONE = $telefone;
        $this->EMAIL = $email;
        $this->LOGIN = $login;
        $this->SENHA = $senha;
        
    }

    // metodo listar todas as categorias
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

        if(isset($_POST["nome"]) && isset($_POST["telefone"]) && isset($_POST["email"]) && isset($_POST["login"]) && isset($_POST["senha"])) {
            $this->NOME = $_POST["nome"];
            $this->TELEFONE = $_POST["telefone"];
            $this->EMAIL = $_POST["email"];
            $this->LOGIN = $_POST["login"];
            $this->SENHA= $_POST["senha"];
            
            //comando sql para inserir o usuario
            $sql = $con->prepare("insert into tecnicos(nome,telefone,email,login,senha) values (?,?,?,?,?)");
            // executar o comando
            $sql->execute(array($this->NOME, $this->TELEFONE, $this->EMAIL, $this->LOGIN, $this->SENHA ));

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
        $sql = $con->prepare("delete from tecnicos where id = ?");
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
        $sql = $con->prepare("select * from tecnicos where id = ?");
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
            $this->NOME = $_POST["nome"];
            $this->TELEFONE = $_POST["telefone"];
            $this->EMAIL = $_POST["email"];
            $this->LOGIN = $_POST["login"];
            $this->SENHA = $_POST["senha"];

            // comando sql para alterar o usuario             $sql =
             $sql=$con->prepare("update tecnicos set nome = ?, telefone = ?, email = ?, login = ?, senha = ? where id =?");
                 $sql->execute(array($this->NOME, $this->TELEFONE,$this->EMAIL,$this->LOGIN, $this->SENHA,$this->ID));

            //testar se o comando deu certo
            if($sql->rowCount() > 0){
                header("Location:./"); // retornar para a raiz da pasta
            }

        }
    }




}











?>