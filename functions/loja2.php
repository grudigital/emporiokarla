<?php
require ("../admin/connections/conn.php");

$sql="INSERT INTO pedidos (pedido,loja,datacadastro) VALUES (rand()*10000,2,now())";
$result = mysqli_query($conn, $sql);

$sqlultimo="select * from pedidos order by id desc limit 1";
$resultultimo = mysqli_query($conn, $sqlultimo);
while ($row2 = mysqli_fetch_assoc($resultultimo)) {
    echo "<meta http-equiv='refresh' content=0;url='../index.php?id=$row2[pedido]'>";
}
mysqli_close($conn);
?>