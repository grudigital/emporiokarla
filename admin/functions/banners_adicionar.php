<?php
require ("../connections/conn.php");

$sql="INSERT INTO banners (titulo,subtitulo,status) VALUES ('$_POST[titulo]','$_POST[subtitulo]','$_POST[status]')";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../banners.php'>";
mysqli_close($conn);
?>