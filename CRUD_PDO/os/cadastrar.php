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


require_once "Os.php";

$usuario = new Os();

$dadoscat = $usuario->listarCategoria();
$dadoscli = $usuario->listarClientes();
$dadostec = $usuario->listarTecnicos();



// pulo do gato
if(isset($_POST["salvar"])){
    $usuario->inserir();
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
            <form action="cadastrar.php" method="post">
                
                <div class="form-group">
                    <label for="status_os">Status Os</label>
                    <input type="text" name="status_os" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="data_abertura">Data de abertura</label>
                    <input type="text" name="data_abertura" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="hora_abertura">Hora de abertura</label>
                    <input type="text" name="hora_abertura" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="data_fechamento">Data de fechamento</label>
                    <input type="text" name="data_fechamento" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="hora_fechamento">Hora de fechamento</label>
                    <input type="text" name="hora_fechamento" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-control">

                                        <?php if($dadoscat) : ?>
                    <!-- utilizar o foreach para percorrer todos os dados -->   
                    <?php foreach($dadoscat as $categoria) : ?>
                    <option value="<?php echo$categoria->ID; ?>"><?php echo$categoria->NOME; ?></option>
                    <!-- fim do laco foreach -->
                    <?php endforeach; ?>
                    <!-- se a variavel dados nao retornou valores -->
                    <?php else : ?>
                    <option value="">Sem registros</option>

                    <?php endif; ?>


                 </select>
                </div>
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <select name="cliente" class="form-control">

                                        <?php if($dadoscli) : ?>
                    <!-- utilizar o foreach para percorrer todos os dados -->   
                    <?php foreach($dadoscli as $clientes) : ?>
                    <option value="<?php echo$clientes->ID; ?>"><?php echo$clientes->NOME; ?></option>
                    <!-- fim do laco foreach -->
                    <?php endforeach; ?>
                    <!-- se a variavel dados nao retornou valores -->
                    <?php else : ?>
                    <option value="">Sem registros</option>

                    <?php endif; ?>


                 </select>
                </div>
                <div class="form-group">
                    <label for="tecnico_executante">Tecnico executante</label>
                    <select name="tecnico_executante" class="form-control">

                                        <?php if($dadostec) : ?>
                    <!-- utilizar o foreach para percorrer todos os dados -->   
                    <?php foreach($dadostec as $tecnicos) : ?>
                    <option value="<?php echo$tecnicos->ID; ?>"><?php echo$tecnicos->NOME; ?></option>
                    <!-- fim do laco foreach -->
                    <?php endforeach; ?>
                    <!-- se a variavel dados nao retornou valores -->
                    <?php else : ?>
                    <option value="">Sem registros</option>

                    <?php endif; ?>


                 </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="resolucao">Resolução</label>
                    <input type="text" name="resolucao" class="form-control" >
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
