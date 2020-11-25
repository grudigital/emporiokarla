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


<section id="home-slider">
    <div class="overlay"></div>
    <!-- SLIDER IMAGES -->
    <div id="owl-main" class="owl-carousel">

        <?php
        require("admin/connections/conn.php");
        $sql = "select * from banners where status = 1";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='item'><img src='admin/uploads/banners/$row[imagem]' alt='$row[titulo]'></div>";
        }
        ?>


    </div>

    <div class="slide-content">
        <div class="voffset100"></div>
        <span style="margin-top: 20px" class="logointro"></span>
        <div id="owl-main-text" class="owl-carousel">
            <div style="margin-top: 20px" class="item">
                <h2>Cardápio digital</h2>
            </div>
            <div class="item">
                <h2 style="font-weight: bold">Empório Karla</h2>
            </div>
        </div>
        <div class="slide-sep"></div>
        <p>Faça seu pedido selecionando abaixo:</p>
    </div>


</section>
<!-- END HOME SLIDER SECTION -->


<!-- BEGIN MENU SECTION -->
<section id="menu" class="section menu">

    <div class="container">
        <div class="jt_row jt_row-fluid row">

            <?php
            require("admin/connections/conn.php");
            $pegaid = (int)$_GET['id'];
            $sql = "select * from categorias";
            $result = mysqli_query($conn, $sql);


            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-12 jt_col column_container'>";
                echo "<div class='voffset100'></div>";
                echo "<div class='title first'>$row[categoria]</div>";
                echo "<div class='voffset10'></div>";
                echo "<img style='margin-top: 50px' class='center' src='admin/uploads/categorias/$row[imagem]' alt='$row[categoria]'>";
                echo "</div>";

                echo "<div class='col-md-3'></div>";
                echo "<div class='col-md-6 jt_col column_container'>";
                echo "<div class='voffset10'></div>";
                echo "<ul class='menu'>";

                $sqlpegaloja = "select * from pedidos where pedido = $pegaid group by pedido";
                $resultpegaloja = mysqli_query($conn, $sqlpegaloja);

                while ($rowpegaloja = mysqli_fetch_assoc($resultpegaloja)) {
                    $sql3 = "select * from itens where loja$rowpegaloja[loja] = 1 and categoria = $row[id]";
                    $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3)) {
                    echo "<form method='post' action='functions/adicionaritem.php'>";
                    echo"<input type='hidden' name='pedido' value='$pegaid'>";
                    echo"<input type='hidden' name='loja' value='$rowpegaloja[loja]'>";
                    echo"<input type='hidden' name='item' value='$row3[id]'>";
                    echo"<input type='hidden' name='valor' value='$row3[preco]'>";
                    echo "<li>$row3[titulo]<div class='detail'>$row3[descricao]<span class='price'>R$ $row3[preco]</span></div><button style='font-size: 14px; height: 25px; margin-top: 20px; width: 100px; border: none; color:#fff; background-color: #7C4414'>Adicionar</button></li>";
                    echo "</form>";
                }
                }
                echo "</ul>";
                echo "</div>";
                echo "<div class='col-md-3'></div>";
            }
            ?>
        </div>
    </div>
    <div class="voffset60"></div>
</section>
<!-- END MENU SECTION -->


<?php include 'includes/footer.php'; ?>
</body>
</html>
