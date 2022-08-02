<?php

// definir as constantes da conexao
define("server", "mysql:host=localhost;dbname=bd_os");
define("usuario", "root");
define("senha","");


class Empresa{
    // atributos da classe
    public $RAZAOSOCIAL;
    public $OBSERVACAO;
    


    public function __construct($razaosocial = null, $observacao= null)
    {
        $this->RAZAOSOCIAL = $razaosocial;
        $this->OBSERVACAO = $observacao;
        
    }

    // metodo listar todas as categorias
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

    // metodo para inserir usuario
    public function inserir(){
        //criar a conexao
        $con = new PDO(server, usuario,senha);

        if(isset($_POST["razaosocial"])  && isset($_POST["observacao"])) {
            $this->RAZAOSOCIAL = $_POST["razaosocial"];
            $this->OBSERVACAO = $_POST["observacao"];
            
            //comando sql para inserir o usuario
            $sql = $con->prepare("insert into empresa(razaosocial,observacao) values (?,?)");
            // executar o comando
            $sql->execute(array($this->RAZAOSOCIAL, $this->OBSERVACAO));

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
        $sql = $con->prepare("delete from empresa where id = ?");
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
        $sql = $con->prepare("select * from empresa where id = ?");
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
            $this->RAZAOSOCIAL = $_POST["razaosocial"];
            $this->OBSERVACAO = $_POST["observacao"];
           

            // comando sql para alterar o usuario
            $sql = $con->prepare("update empresa set razaosocial = ?, observacao = ? where id =?");
            $sql->execute(array($this->RAZAOSOCIAL, $this->OBSERVACAO,$this->ID));

            //testar se o comando deu certo
            if($sql->rowCount() > 0){
                header("Location:./"); // retornar para a raiz da pasta
            }

        }
    }




}











?>