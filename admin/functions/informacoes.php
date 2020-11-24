<?php
$id = intval($_REQUEST['id']);
$telefone = $_REQUEST['telefone'];
$email = $_REQUEST['email'];
$instagram = $_REQUEST['instagram'];
$facebook = $_REQUEST['facebook'];
$telegram = $_REQUEST['telegram'];
$youtube = $_REQUEST['youtube'];

require("../connections/conn.php");
$sql = "update informacoes set telefone='$telefone',email='$email',instagram='$instagram',facebook='$facebook',telegram='$telegram',youtube='$youtube' where id=$id";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../informacoes.php'>";
mysqli_close($conn);
?>