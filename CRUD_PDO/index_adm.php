<?php
session_start();
$usuario = ""; // para exibir nome no menu do usuario
// validar se o usuario logou no site
if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{//usuario não está logado
header("location:index.php");
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gerenciador de Contas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sistema OS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="categoria/index.php">Categorias</a></li>
      <li><a href="clientes/index.php">Clientes</a></li>
      <li><a href="os/index.php">Ordem de Serviço</a></li>
      <li><a href="usuarios/index.php">Usuários</a></li>
      <li><a href="tecnicos/index.php">Técnicos</a></li>
      <li><a href="empresa/index.php">Empresa</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
         <li><a><?php echo $usuario; ?></li></a>
         <li><a href="sair.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

  <div class="col-xs-6 col-sm-3 col-md-2">
  <a href="categoria/index.php" class="btn btn-success">
  <div class="row">
    <div class="col-xs-12 text-center">
      <i class="fa fa-copy fa-5x"></i>
    </div>
    <div class="col-xs-12 text-center">
      <p>Categorias</p>
    </div>
  </div>
  </a>
</div>
<div class="col-xs-6 col-sm-3 col-md-2">
  <a href="clientes/index.php" class="btn btn-primary">
  <div class="row">
    <div class="col-xs-12 text-center">
      <i class="fa fa-calendar fa-5x"></i>
    </div>
    <div class="col-xs-12 text-center">
      <p>Clientes</p>
    </div>
  </div>
  </a>
</div>



<div class="col-xs-6 col-sm-3 col-md-2">
  <a href="os/index.php" class="btn btn-danger">
  <div class="row">
    <div class="col-xs-12 text-center">
      <i class="fa fa-pie-chart fa-5x"></i>
    </div>
    <div class="col-xs-12 text-center">
      <p>Ordem de Serviço</p>
    </div>
  </div>
  </a>
</div>

<div class="col-xs-6 col-sm-3 col-md-2">
  <a href="usuarios/index.php" class="btn btn-info">
  <div class="row">
    <div class="col-xs-12 text-center">
      <i class="fa fa-repeat fa-5x"></i>
    </div>
    <div class="col-xs-12 text-center">
      <p>Usuários</p>
    </div>
  </div>
  </a>
</div>
  <div class="col-xs-6 col-sm-3 col-md-2">
  <a href="tecnicos/index.php" class="btn btn-dark">
  <div class="row">
    <div class="col-xs-12 text-center">
      <i class="fa fa-cogs fa-5x"></i>
    </div>
    <div class="col-xs-12 text-center">
      <p>Técnico</p>
    </div>
  </div>
  </a>
</div>
  <div class="col-xs-6 col-sm-3 col-md-2">
  <a href="empresa/index.php" class="btn btn-warning">
  <div class="row">
    <div class="col-xs-12 text-center">
      <i class="fa fa-bank fa-5x"></i>
    </div>
    <div class="col-xs-12 text-center">
      <p>Empresas</p>
    </div>
  </div>
  </a>
</div>


</div>

</body>
</html>
