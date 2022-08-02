<?php

session_start();//iniciar sessao
session_destroy();// destruir a sessao
session_unset();//limpar sessao

//voltar para o index
header("location:index.php");

?>