<?php
require ("../admin/connections/conn.php");

$sql="INSERT INTO sugestoes (loja,nome,telefone,mensagem,dataenvio) VALUES ('$_POST[loja]','$_POST[nome]','$_POST[telefone]','$_POST[mensagem]',now())";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../sugestoes.php'>";
mysqli_close($conn);
?>