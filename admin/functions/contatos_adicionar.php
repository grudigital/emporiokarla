<?php
require ("../admin/connections/conn.php");

$sql="INSERT INTO contatos (nome,telefone,email,mensagem,status,datacontato) VALUES ('$_POST[nome]','$_POST[telefone]','$_POST[email]','$_POST[mensagem]','$_POST[status]',now())";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../contato_enviado.php'>";
mysqli_close($conn);
?>


