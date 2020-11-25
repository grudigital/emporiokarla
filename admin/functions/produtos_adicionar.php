<?php
require ("../connections/conn.php");

$sql="INSERT INTO itens (titulo,categoria,descricao,preco) VALUES ('$_POST[titulo]','$_POST[categoria]','$_POST[descricao]','$_POST[preco]')";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../produtos.php'>";
mysqli_close($conn);
?>