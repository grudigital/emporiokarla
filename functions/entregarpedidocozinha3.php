<?php
$pedido = intval($_REQUEST['pedido']);

require("../admin/connections/conn.php");
$sql = "update pedidos set status='4' where pedido=$pedido";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../cozinha3.php'>";
mysqli_close($conn);
?>