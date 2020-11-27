<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'includes/head.php'; ?>

<body>
<div id="mask">
    <div class="loader">
        <img src="svg-loaders/tail-spin.svg" alt='loading'>
    </div>
</div>
<?php include 'includes/header.php'; ?>


<!-- BEGIN MENU SECTION -->
<section id="menu" class="section menu">

    <div class="container">
        <div class="jt_row jt_row-fluid row">


            <?php
            require("admin/connections/conn.php");
            $pegaid = (int)$_GET['id'];
            $sql = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, p.quantidade pquantidade, (p.valor * p.quantidade) as valortotalquantidade, p.status pstatus, i.id iid, i.titulo ititulo, i.descricao idescricao from pedidos as p inner join itens as i on i.id = p.item where p.pedido = '$pegaid'";
            $result = mysqli_query($conn, $sql);

            $sqlpegapedido = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, p.status pstatus, i.id iid, i.titulo ititulo, i.descricao idescricao from pedidos as p inner join itens as i on i.id = p.item where p.pedido = '$pegaid' order by p.id desc limit 1";
            $resultpegapedido = mysqli_query($conn, $sqlpegapedido);

            $sqlitenspedidosoma = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, p.quantidade pquantidade, sum(p.valor * p.quantidade) as valortotalpedido, p.status pstatus, i.id iid, i.titulo ititulo from pedidos as p inner join itens as i on p.item = i.id where p.pedido = '$pegaid' group by p.pedido";
            $resultitenspedidosoma = mysqli_query($conn, $sqlitenspedidosoma);


            echo "<div class='col-md-12 jt_col column_container'>";
            echo "<div class='voffset100'></div>";
            while ($rowpegapedido = mysqli_fetch_assoc($resultpegapedido)) {
                echo "<div style='margin-bottom: 40px' class='title first'>Meus itens </div>";
                echo "<div style='margin-top: -20px; margin-bottom: 50px; font-size: 15px; font-weight: bold; text-align: center'>Pedido: $rowpegapedido[ppedido]";
                while ($rowitenspedidosoma = mysqli_fetch_assoc($resultitenspedidosoma)) {
                    $numerocasas = $rowitenspedidosoma['valortotalpedido'];
                    $numerocasasdecimais = number_format($numerocasas, 2, '.', '');
                    echo " - Total:  R$ $numerocasasdecimais";
                }

                echo "</div>";
            }
            echo "<div class='voffset10'></div>";
            echo "</div>";
            echo "<div class='col-md-3'></div>";
            echo "<div class='col-md-6 jt_col column_container'>";
            echo "<div class='voffset10'></div>";
            echo "<ul class='menu'>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<form method='post' action='functions/retiraritem.php'>";
                echo "<input type='hidden' name='itempedido' value='$row[pid]'>";
                echo "<input type='hidden' name='pedido' value='$row[ppedido]'>";
                if ($row['pstatus'] == 1 or $row['pstatus'] == 0 or $row['pstatus'] == null) {
                    if($row['pquantidade'] <= 1){
                        echo "<li>$row[ititulo] - $row[pquantidade] item<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $row[valortotalquantidade]</span></div><button style='font-size: 14px; height: 25px; margin-bottom: 30px; margin-top: 20px; width: 100px; border: none; color:#fff; background-color: #9b111e'>Retirar</button></li>";
                    }
                    else{
                        $numerocasas2 = $row['valortotalquantidade'];
                        $numerocasasdecimais2 = number_format($numerocasas2, 2, '.', '');
                        echo "<li>$row[ititulo] - $row[pquantidade] itens<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $numerocasasdecimais2 ( R$ $row[pvalor] unid.)</span></div><button style='font-size: 14px; height: 25px; margin-bottom: 30px; margin-top: 20px; width: 100px; border: none; color:#fff; background-color: #9b111e'>Retirar</button></li>";
                    }
                } else if ($row['pstatus'] == 2) {
                    if($row['pquantidade'] <= 1){
                        echo "<li>$row[ititulo] - $row[pquantidade] item<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $row[valortotalquantidade]</span></div></li>";
                    }
                    else{
                        $numerocasas2 = $row['valortotalquantidade'];
                        $numerocasasdecimais2 = number_format($numerocasas2, 2, '.', '');
                        echo "<li>$row[ititulo] - $row[pquantidade] itens<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $numerocasasdecimais2 ( R$ $row[pvalor] unid.)</span></div></li>";
                    }
                } else if ($row['pstatus'] == 3) {
                    if($row['pquantidade'] <= 1){
                        echo "<li>$row[ititulo] - $row[pquantidade] item<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $row[valortotalquantidade]</span></div></li>";
                    }
                    else{
                        $numerocasas2 = $row['valortotalquantidade'];
                        $numerocasasdecimais2 = number_format($numerocasas2, 2, '.', '');
                        echo "<li>$row[ititulo] - $row[pquantidade] itens<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $numerocasasdecimais2 ( R$ $row[pvalor] unid.)</span></div></li>";
                    }
                } else if ($row['pstatus'] == 4) {
                    if($row['pquantidade'] <= 1){
                        echo "<li>$row[ititulo] - $row[pquantidade] item<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $row[valortotalquantidade]</span></div></li>";
                    }
                    else{
                        $numerocasas2 = $row['valortotalquantidade'];
                        $numerocasasdecimais2 = number_format($numerocasas2, 2, '.', '');
                        echo "<li>$row[ititulo] - $row[pquantidade] itens<div style='margin-top: 10px' class='detail'>$row[idescricao]<span class='price'>R$ $numerocasasdecimais2 ( R$ $row[pvalor] unid.)</span></div></li>";
                    }
                }
                echo "</form>";
            }
            echo "</ul>";
            echo "</div>";
            echo "<div class='col-md-3'></div>";
            echo "<div class='container'>";
            echo "<div class='col-md-3'></div>";
            echo "<div class='col-md-6'>";
            echo "<hr>";
            echo "<form action='functions/processarpedido.php' method='post'>";
            echo "<input type='hidden' name='pedido' value='$pegaid'>";

            $pegaid = (int)$_GET['id'];
            $sql4 = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, p.status pstatus, i.id iid, i.titulo ititulo, i.descricao idescricao from pedidos as p inner join itens as i on i.id = p.item where p.pedido = '$pegaid' order by p.id desc limit 1";
            $result4 = mysqli_query($conn, $sql4);

            while ($row4 = mysqli_fetch_assoc($result4)) {
                if ($row4['pstatus'] == 0) {
                    echo "<button style='width: 100%; background-color: #414142; border: none; height: 30px; color: #fff; font-weight: bold'>Enviar pedido</button>";
                } else if ($row4['pstatus'] == 2) {
                    echo "<div style='width: 100%; color: #fff; background-color: #9b111e; height: 60px; padding-top: 10px;  text-align: center; font-weight: bold' class='alert alert-warning' role='alert'>Aguardando pagamento.<br/> Por favor se dirija ao caixa.</div>";
                } else if ($row4['pstatus'] == 3) {
                    echo "<div style='width: 100%; color: #fff; background-color: #054f77; height: 60px; padding-top: 10px;  text-align: center; font-weight: bold' class='alert alert-info' role='alert'>Pedido em preparação.<br/> Aguarde mais um pouco.</div>";
                } else if ($row4['pstatus'] == 4) {
                    echo "<div style='width: 100%; color: #fff; background-color: #008000; height: 60px; padding-top: 10px;  text-align: center; font-weight: bold' class='alert alert-success' role='alert'>Seu pedido foi entregue. Tenha uma ótima refeição.</div>";
                }
            }

            echo "</form>";
            echo "</div>";
            echo "<div class='col-md-3'></div>";
            echo "</div>";
            ?>
        </div>
    </div>
    <div class="voffset60"></div>
</section>
<!-- END MENU SECTION -->


<?php include 'includes/footer.php'; ?>
</body>
</html>
