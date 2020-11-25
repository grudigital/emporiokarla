<?php
$id = intval($_REQUEST['id']);
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];

require("../connections/conn.php");
$sql = "update administradores set nome='$nome',email='$email' where id=$id";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../administradores.php'>";
mysqli_close($conn);
?>
