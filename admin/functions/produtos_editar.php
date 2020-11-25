<?php
$id = intval($_REQUEST['id']);
$titulo = $_REQUEST['titulo'];
$categoria = $_REQUEST['categoria'];
$descricao = $_REQUEST['descricao'];
$preco = $_REQUEST['preco'];

require("../connections/conn.php");
$sql = "update itens set titulo='$titulo',categoria='$categoria',descricao='$descricao',preco='$preco' where id=$id";
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}
echo "<meta http-equiv='refresh' content=0;url='../produtos.php'>";
mysqli_close($conn);
?>
