<?php

$servidor = "cardapio2020.mysql.uhserver.com";
$usuario = "prod1";
$senha = "EP@2020";
$dbname = "cardapio2020";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conexao realizada com sucesso";
}
?>


