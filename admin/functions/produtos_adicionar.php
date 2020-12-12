<?php
require ("../connections/conn.php");

$sql="INSERT INTO itens (titulo,ordem,categoria,descricao,preco,loja1,loja2,loja3,loja4,loja5,loja6,loja7,loja8,loja9,loja10) VALUES ('$_POST[titulo]','$_POST[ordem]','$_POST[categoria]','$_POST[descricao]','$_POST[preco]','2','2','2','2','2','2','2','2','2','2')";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../produtos.php'>";
mysqli_close($conn);
?>