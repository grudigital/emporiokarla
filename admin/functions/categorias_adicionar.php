<?php
require ("../connections/conn.php");

$sql="INSERT INTO categorias (categoria,ordem) VALUES ('$_POST[categoria]','$_POST[ordem]')";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../categorias.php'>";
mysqli_close($conn);
?>