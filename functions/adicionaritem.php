<?php
require ("../admin/connections/conn.php");

$sql="INSERT INTO pedidos (pedido,loja,item,quantidade,valor,datacadastro) VALUES ('$_POST[pedido]','$_POST[loja]','$_POST[item]','$_POST[quantidade]','$_POST[valor]',now())";
$result = mysqli_query($conn, $sql);

    echo "<meta http-equiv='refresh' content=0;url='../index.php?id=$_POST[pedido]'>";

mysqli_close($conn);
?>