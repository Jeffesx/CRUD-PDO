<?php
header("Content-type:text/html; charset=utf8");


session_start();
$usuario = ""; // para exibir nome no menu do usuario
// validar se o usuario logou no site
if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{//usuario não está logado
header("location:index.php");
}

require_once "Os.php";
// criar um objeto do tipo classe Usuario
$usuario = new Os();

// recupera os dados do usuario
$lista = $usuario->listarOs();

// chamar a funcao excluir
if(isset($_GET["id"])){
    $usuario->excluir($_GET["id"]);
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
            <h2 align="center">Lista de Ordem de Serviço</h2>
        </div>
        <div class="col-md-2">
            <a href="cadastrar.php" class="btn btn-primary">Nova Os</a>
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
                        <th>STATUS_OS</th>
                        <th>DATA_ABERTURA</th>
                        <th>HORA_ABERTURA</th>
                        <th>DATA_FECHAMENTO</th>
                        <th>HORA_FECHAMENTO</th>
                        <th>TITULO</th>
                        <th>CATEGORIA</th>
                        <th>CLIENTE</th>
                        <th>TECNICO_EXECUTANTE</th>
                        <th>DESCRICAO</th>
                        <th>RESOLUCAO</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- testando se a variavel dados possui valores -->
                    <?php if($lista) : ?>
                    <?php foreach ($lista as $usuarios) : ?>
                    <tr>
                      <td><?php echo $usuarios->ID; ?></td>
                      <td><?php echo $usuarios->STATUS_OS; ?></td>
                      <td><?php echo $usuarios->DATA_ABERTURA; ?></td>
                      <td><?php echo $usuarios->HORA_ABERTURA; ?></td>
                      <td><?php echo $usuarios->DATA_FECHAMENTO; ?></td>
                      <td><?php echo $usuarios->HORA_FECHAMENTO; ?></td>
                      <td><?php echo $usuarios->TITULO; ?></td>
                      <td><?php echo $usuarios->CATEGORIA; ?></td>
                      <td><?php echo $usuarios->CLIENTE; ?></td>
                      <td><?php echo $usuarios->TECNICO_EXECUTANTE; ?></td>
                      <td><?php echo $usuarios->DESCRICAO; ?></td>
                      <td><?php echo $usuarios->RESOLUCAO; ?></td>
                      <td>
                          <a href="alterar.php?id=<?php echo $usuarios->ID; ?>" class="btn btn-success">Editar</a>
                          <a href="index.php?id=<?php echo $usuarios->ID; ?>" class="btn btn-danger">Excluir</a>
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
