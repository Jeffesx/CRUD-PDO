<?php
header("Content-type:text/html; charset=utf8");

require_once "Logar.php";
$usuario = new Logar();

// pulo do gato
if(isset($_POST["entrar"])){
    $usuario->logar();
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Base PHP</title>
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
            <h3>Cadastro de Usuários</h3>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <button class="btn btn-primary btn-block" type="submit" name="entrar">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>

</html>