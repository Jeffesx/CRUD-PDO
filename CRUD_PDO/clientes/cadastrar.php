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


require_once "Cliente.php";
$usuario = new Cliente();

// pulo do gato
if(isset($_POST["salvar"])){
    $usuario->inserir();
}

$dadosemp = $usuario->listarEmpresas();

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
            <h3>Cadastro de Clientes</h3>
            <form action="cadastrar.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <select name="empresa" class="form-control">

                                        <?php if($dadosemp) : ?>
                    <!-- utilizar o foreach para percorrer todos os dados -->   
                    <?php foreach($dadosemp as $empresa) : ?>
                    <option value="<?php echo$empresa->ID; ?>"><?php     echo$empresa->RAZAOSOCIAL; ?></option>
                    <!-- fim do laco foreach -->
                    <?php endforeach; ?>
                    <!-- se a variavel dados nao retornou valores -->
                    <?php else : ?>
                    <option value="">Sem registros</option>

                    <?php endif; ?>


                 </select>
                 </div>
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <input type="text" name="departamento" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone_fixo">Telefone fixo</label>
                    <input type="text" name="telefone_fixo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone_celular">Telefone celular</label>
                    <input type="text" name="telefone_celular" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="observacao">Observação</label>
                    <input type="text" name="observacao" class="form-control">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="text" name="senha" class="form-control">
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
