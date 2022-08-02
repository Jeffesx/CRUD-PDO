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

// chamar a funcao listarID
if(isset($_GET["id"])){
    $dados = $tecnico->listarID($_GET["id"]);
}


// pulo do gato
if(isset($_POST["salvar"])){
    $tecnico->alterar();
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Tecnico</title>
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
            <h3>Alterar dados do Técnico</h3>
            <form action="alterar.php?id=<?php echo $dados->ID; ?>" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $dados->NOME; ?>">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?php echo $dados->TELEFONE; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $dados->EMAIL; ?>">
                </div>
                    <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control" value="<?php echo $dados->LOGIN; ?>">
                </div>
                    <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" value="<?php echo $dados->SENHA; ?>">
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
