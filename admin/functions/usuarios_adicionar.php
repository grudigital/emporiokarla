<?php
require ("../connections/conn.php");

$sql="INSERT INTO usuarios (nome,email,senha) VALUES ('$_POST[nome]','$_POST[email]',MD5('$_POST[senha]'))";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../usuarios_adicionado.php'>";
mysqli_close($conn);
?>


