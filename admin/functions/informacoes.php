<?php
$id = intval($_REQUEST['id']);
$facebook = $_REQUEST['facebook'];
$instagram = $_REQUEST['instagram'];
$funcsegsab = $_REQUEST['funcsegsab'];
$funcdom = $_REQUEST['funcdom'];


require("../connections/conn.php");
$sql = "update informacoes set facebook='$facebook',instagram='$instagram',funcsegsab='$funcsegsab',funcdom='$funcdom' where id=$id";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../informacoes.php'>";
mysqli_close($conn);
?>