<?php
$id = intval($_REQUEST['id']);
$categoria = $_REQUEST['categoria'];
$ordem = $_REQUEST['ordem'];

require("../connections/conn.php");
$sql = "update categorias set categoria='$categoria',ordem='$ordem' where id=$id";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../categorias.php'>";
mysqli_close($conn);
?>