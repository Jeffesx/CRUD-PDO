<?php
header("Content-type:text/html; charset=utf8");

session_start();
$usuario = ""; // para exibir nome no menu do usuario
// validar se o usuario logou no site
if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{//usuario não está logado
header("location:../index.php");
}


require_once "Tecnico.php";
$tecnico = new Tecnico();

// 
if(isset($_POST["salvar"])){
    $tecnico->inserir();
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Técnicos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3>Cadastro de Técnicos</h3>
            <form action="cadastrar.php" method="post">
                 
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <button class="btn btn-primary btn-block" type="submit" name="salvar">Salvar</button>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a href="index.php" class="btn btn-danger btn-block">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>

</html>
