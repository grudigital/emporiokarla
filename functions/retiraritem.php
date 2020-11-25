<?php
$itempedido = intval($_REQUEST['itempedido']);
$pedido = $_REQUEST['pedido'];

include("../admin/connections/conn.php");
$result = mysqli_query($conn,"delete from pedidos where id = '$itempedido'");
if ($result){
    echo "<meta http-equiv='refresh' content=0;url='../meus-pedidos.php?id=$pedido'>";
} else {
    echo json_encode(array('msg'=>'Erro ao remover dados.'));
}
?>