<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'includes/head.php'; ?>

<body>
<div id="mask">
    <div class="loader">
        <img src="svg-loaders/tail-spin.svg" alt='loading'>
    </div>
</div>


<header id="header" role="banner">
    <div class="jt_row container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand normal logo" href="index.php">
                <div class="logo_elixir"></div>
            </a>
            <a class="navbar-brand mini" href="index.php">
                <div class="logo_elixir dark"></div>
            </a>
            <a class="navbar-brand mini darker" href="index.php">
                <div class="logo_elixir dark"></div>
            </a>
        </div>


    </div>
</header>


<!-- BEGIN MENU SECTION -->
<section id="menu" class="section menu">

    <div class="container">
        <div class="jt_row jt_row-fluid row">


            <?php
            require("admin/connections/conn.php");
            $sql = "select * from pedidos where status = 2 and loja = 3 group by pedido order by id asc";
            $result = mysqli_query($conn, $sql);

            $resulttotal = mysqli_num_rows($result);

            echo "<div class='col-md-12 jt_col column_container'>";
            echo "<div class='voffset100'></div>";
            echo "<div style='margin-bottom: 40px' class='title first'>Aguardando pagamento</div>";
            echo "<div class='voffset10'></div>";
            echo "</div>";
            echo "<div class='col-md-4'></div>";
            echo "<div class='col-md-4 jt_col column_container'>";
            echo "<div class='voffset10'></div>";
            echo "<ul class='menu'>";

            if($resulttotal == 0 or $resulttotal == null){
                echo "<p style='text-align: center'>Não há pedidos aguardando pagamento</p>";
            }

            while ($row = mysqli_fetch_assoc($result)) {



                $sqlitenspedidosoma = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, sum(p.valor) as valortotalpedido, p.status pstatus, i.id iid, i.titulo ititulo from pedidos as p inner join itens as i on p.item = i.id where p.pedido = $row[pedido] group by p.pedido";
                $resultitenspedidosoma = mysqli_query($conn, $sqlitenspedidosoma);

                while ($rowitenspedidosoma = mysqli_fetch_assoc($resultitenspedidosoma)) {

                    echo "<li style='text-align: center'>Pedido $row[pedido] - R$ $rowitenspedidosoma[valortotalpedido]";
                }


                $sqlitenspedido = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, p.status pstatus, i.id iid, i.titulo ititulo from pedidos as p inner join itens as i on p.item = i.id where p.pedido = $row[pedido]";
                $resultitenspedido = mysqli_query($conn, $sqlitenspedido);


                while ($rowitenspedido = mysqli_fetch_assoc($resultitenspedido)) {

                    echo "<div class='detail'>$rowitenspedido[ititulo] - ";
                    echo "R$ $rowitenspedido[pvalor] </div>";

                }


                echo "<form method='post' action='functions/confirmarpagamento3.php'>";
                echo "<input type='hidden' name='pedido' value='$row[pedido]'>";
                echo "<button style='font-size: 14px; height: 35px; margin-bottom: 30px; margin-top: 20px; width: 100%; border: none; color:#fff; background-color: #008000'>Confirmar pagamento</button></li>";
                echo "</form>";


                echo "<hr>";
            }
            echo "</ul>";
            echo "</div>";
            echo "<div class='col-md-4'></div>";

            ?>
        </div>
    </div>
    <div class="voffset60"></div>
</section>


<section id="menu" class="section menu">

    <div class="container">
        <div class="jt_row jt_row-fluid row">


            <?php
            require("admin/connections/conn.php");
            $sql = "select * from pedidos where status = 3 and loja = 3 group by pedido order by id asc";
            $result = mysqli_query($conn, $sql);
            $resulttotal = mysqli_num_rows($result);


            echo "<div class='col-md-12 jt_col column_container'>";
            echo "<div class='voffset100'></div>";
            echo "<div style='margin-bottom: 40px' class='title first'>Pedidos em preparação</div>";
            echo "<div class='voffset10'></div>";
            echo "</div>";
            echo "<div class='col-md-4'></div>";
            echo "<div class='col-md-4 jt_col column_container'>";
            echo "<div class='voffset10'></div>";
            echo "<ul class='menu'>";

            if($resulttotal == 0 or $resulttotal == null){
                echo "<p style='text-align: center'>Não há pedidos em preparação</p>";
            }


            while ($row = mysqli_fetch_assoc($result)) {

                $sqlitenspedidosoma = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, sum(p.valor) as valortotalpedido, p.status pstatus, i.id iid, i.titulo ititulo from pedidos as p inner join itens as i on p.item = i.id where p.pedido = $row[pedido] group by p.pedido";
                $resultitenspedidosoma = mysqli_query($conn, $sqlitenspedidosoma);

                while ($rowitenspedidosoma = mysqli_fetch_assoc($resultitenspedidosoma)) {

                    echo "<li style='text-align: center'>Pedido $row[pedido]";
                }


                $sqlitenspedido = "select p.id pid, p.pedido ppedido, p.loja ploja, p.item pitem, p.valor pvalor, p.status pstatus, i.id iid, i.titulo ititulo from pedidos as p inner join itens as i on p.item = i.id where p.pedido = $row[pedido]";
                $resultitenspedido = mysqli_query($conn, $sqlitenspedido);


                while ($rowitenspedido = mysqli_fetch_assoc($resultitenspedido)) {

                    echo "<div class='detail'>$rowitenspedido[ititulo] ";
                    echo "</div>";

                }

                echo "<form method='post' action='functions/entregarpedido3.php'>";
                echo "<input type='hidden' name='pedido' value='$row[pedido]'>";
                echo "<button style='font-size: 14px; height: 35px; margin-bottom: 30px; margin-top: 20px; width: 100%; border: none; color:#fff; background-color: #054f77'>Pedido pronto</button></li>";
                echo "</form>";

                echo "</form>";
                echo "<hr>";
            }
            echo "</ul>";
            echo "</div>";
            echo "<div class='col-md-4'></div>";

            ?>
        </div>
    </div>
    <div class="voffset60"></div>
</section>


<?php include 'includes/footer.php'; ?>
</body>
</html>
