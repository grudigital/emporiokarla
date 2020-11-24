<?php

$servidor = "localhost";
$usuario = "u319275366_grudigital";
$senha = "2423*Wxci290989";
$dbname = "u319275366_sistema2020";

//$servidor = "localhost";
//$usuario = "root";
//$senha = "";
//$dbname = "guiadasparaosucesso";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conexao realizada com sucesso";
}
?>


