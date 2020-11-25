<?php
$id = intval($_REQUEST['id']);
$titulo = $_REQUEST['titulo'];
$subtitulo = $_REQUEST['subtitulo'];

require("../connections/conn.php");
$sql = "update banners set titulo='$titulo',subtitulo='$subtitulo' where id=$id";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../banners.php'>";
mysqli_close($conn);
?>