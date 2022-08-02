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
// criar um objeto do tipo classe Usuario
$tecnico = new Tecnico();

// recupera os dados do usuario
$lista = $tecnico->listarTecnicos();

// chamar a funcao excluir
if(isset($_GET["id"])){
    $tecnico->excluir($_GET["id"]);
}

?>



<!DOCTYPE html>
<html>
<head>

    <title>Base PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#tabela').DataTable();
        } );
    </script>


</head>
<body>
<header>
    <div class="row">
        <div class="col-md-8">
            <h2 align="center">Lista de Técnicos</h2>
        </div>
        <div class="col-md-2">
            <a href="cadastrar.php" class="btn btn-primary">Novo Técnico</a>
        </div>
        <div class="col-md-2"></div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped" id="tabela">
                <thead>
                    <!-- criar uma linha <tr> -->
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>TELEFONE</th>
                        <th>EMAIL</th>
                        <th>LOGIN</th>
                        <th>SENHA</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- testando se a variavel dados possui valores -->
                    <?php if($lista) : ?>
                    <?php foreach ($lista as $tecnico) : ?>
                    <tr>
                      <td><?php echo $tecnico->ID; ?></td>
                      <td><?php echo $tecnico->NOME; ?></td>
                      <td><?php echo $tecnico->TELEFONE; ?></td>
                      <td><?php echo $tecnico->EMAIL; ?></td>
                      <td><?php echo $tecnico->LOGIN; ?></td>  
                      <td><?php echo $tecnico->SENHA; ?></td>

                      <td>
                          <a href="alterar.php?id=<?php echo $tecnico->ID; ?>" class="btn btn-success">Editar</a>
                          <a href="index.php?id=<?php echo $tecnico->ID; ?>" class="btn btn-danger">Excluir</a>
                      </td>
                    </tr>
                    <?php endforeach; ?> <!-- fechar o foreach -->
                    <?php else : ?>
                    <tr>
                        <td class="colspan=3">Nenhum registro encontrado!!</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>


</body>
</html>
</html>