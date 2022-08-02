<?php

// definir as constantes da conexao
define("server", "mysql:host=localhost;dbname=bd_os");
define("usuario", "root");
define("senha","");


class Logar{
    // atributos da classe

    public $LOGIN;
    public $SENHA;


    public function __construct($login= null, $senha= null)
    {
        $this->LOGIN = $login;
        $this->SENHA = $senha;
    }

    public function logar(){


    $con = new PDO(server,usuario,senha);


        if(isset($_POST["login"]) && isset($_POST["senha"])) {
            $this->LOGIN = $_POST["login"];
            $this->SENHA = $_POST["senha"];
            //comando sql para inserir o usuario
            $sql = $con->prepare("select * from usuario where login = ? and senha = ?;");
            // executar o comando
            $sql->execute(array($this->LOGIN, $this->SENHA));

            //testar se o comando deu certo
            if ($sql->rowCount() > 0) {

                session_start();
                        $result = $sql->fetchObject();
        $_SESSION["usuario"] = $result->NOME;


                header("Location:index_adm.php"); // retornar para raiz da pasta
            }
        }


    }


}











?>