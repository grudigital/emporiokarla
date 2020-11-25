<?php
$pedido = intval($_REQUEST['pedido']);

require("../admin/connections/conn.php");
$sql = "update pedidos set status='3' where pedido=$pedido";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../caixa4.php'>";
mysqli_close($conn);
?>