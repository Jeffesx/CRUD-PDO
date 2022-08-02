<?php

// definir as constantes da conexao
define("server", "mysql:host=localhost;dbname=bd_os");
define("usuario", "root");
define("senha","");


class Cliente{
    // atributos da classe
    public $ID;
    public $NOME;
    public $EMPRESA;
    public $DEPARTAMENTO;
    public $TELEFONE_FIXO;
    public $TELEFONE_CELULAR;
    public $EMAIL;
    public $OBSERVACAO;
    public $LOGIN;
    public $SENHA;


    public function __construct($id = null, $nome= null, $empresa= null, $departamento= null, $telefone_fixo = null, $telefone_celular = null, $email = null, $observacao = null, $login = null, $senha = null)
    {
        $this->ID = $id;
        $this->NOME = $nome;
        $this->EMPRESA = $empresa;
        $this->DEPARTAMENTO = $departamento;
        $this->TELEFONE_FIXO = $telefone_fixo;
        $this->TELEFONE_CELULAR = $telefone_celular;
        $this->EMAIL = $email;
        $this->OBSERVACAO = $observacao;
        $this->LOGIN = $login;
        $this->SENHA = $senha;
    }

    // metodo listar todas as categorias
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
     public function listarEmpresas(){
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

    // metodo para inserir usuario
    public function inserir(){
        //criar a conexao
        $con = new PDO(server, usuario,senha);

     

        if(isset($_POST["nome"]) && isset($_POST["empresa"]) && isset($_POST["departamento"]) && isset($_POST["telefone_fixo"]) && isset($_POST["telefone_celular"]) && isset($_POST["email"]) && isset($_POST["observacao"]) && isset($_POST["login"]) && isset($_POST["senha"])) {
            
            $this->NOME = $_POST["nome"];
            $this->EMPRESA = $_POST["empresa"];
            $this->DEPARTAMENTO = $_POST["departamento"];
            $this->TELEFONE_FIXO= $_POST["telefone_fixo"];
            $this->TELEFONE_CELULAR = $_POST["telefone_celular"];
            $this->EMAIL = $_POST["email"];
            $this->OBSERVACAO = $_POST["observacao"];
            $this->LOGIN = $_POST["login"];
            $this->SENHA = $_POST["senha"];

            //comando sql para inserir o usuario
            $sql = $con->prepare("insert into clientes(NOME,EMPRESA,DEPARTAMENTO,TELEFONE_FIXO,TELEFONE_CELULAR,EMAIL,OBSERVACAO,LOGIN,SENHA) values (?,?,?,?,?,?,?,?,?)");
            // executar o comando
            $sql->execute(array($this->NOME, $this->EMPRESA, $this->DEPARTAMENTO, $this->TELEFONE_FIXO, $this->TELEFONE_CELULAR, $this->EMAIL, $this->OBSERVACAO, $this->LOGIN, $this->SENHA));

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
        $sql = $con->prepare("delete from clientes where id = ?");
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
        $sql = $con->prepare("select * from clientes where id = ?");
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
            $this->EMPRESA = $_POST["empresa"];
            $this->DEPARTAMENTO = $_POST["departamento"];
            $this->TELEFONE_FIXO= $_POST["telefone_fixo"];
            $this->TELEFONE_CELULAR = $_POST["telefone_celular"];
            $this->EMAIL = $_POST["email"];
            $this->OBSERVACAO = $_POST["observacao"];
            $this->LOGIN = $_POST["login"];
            $this->SENHA = $_POST["senha"];



            // comando sql para alterar o usuario
            $sql = $con->prepare("update clientes set nome = ?, empresa = ?, departamento = ?, telefone_fixo = ?, telefone_celular = ?, email = ?, observacao = ?, login = ?, senha = ? where id =?");
            $sql->execute(array($this->NOME, $this->EMPRESA, $this->DEPARTAMENTO,$this->TELEFONE_FIXO,$this->TELEFONE_CELULAR,$this->EMAIL,$this->OBSERVACAO,$this->LOGIN,$this->SENHA,$this->ID));

            //testar se o comando deu certo
            if($sql->rowCount() > 0){
                header("Location:./"); // retornar para a raiz da pasta
            }

        }
    }




}











?>