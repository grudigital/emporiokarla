<header id="header" role="banner">
    <div class="jt_row container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand normal logo" href="index.php"><div class="logo_elixir"></div></a>
            <a class="navbar-brand mini" href="index.php"><div class="logo_elixir dark"></div></a>
            <a class="navbar-brand mini darker" href="index.php"><div class="logo_elixir dark"></div></a>
        </div>

        <!-- BEGIN NAVIGATION MENU-->
        <nav class="collapse navbar-collapse navbar-right navbar-main-collapse" role="navigation">
            <ul class="nav navbar-nav navigation">

                <?php
                require("admin/connections/conn.php");
                $pegaid = (int)$_GET['id'];
                $sql = "select * from pedidos where pedido = '$pegaid' group by pedido";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li class='page-scroll menu-item'><a href='index.php?id=$row[pedido]'>Cardápio</a></li>";
                    echo "<li class='page-scroll menu-item'><a href='sugestoes.php?id=$row[pedido]'>Sugestões</a></li>";
                    echo "<li class='page-scroll menu-item'><a href='meus-pedidos.php?id=$row[pedido]'>Meus pedidos</a></li>";
                }
                mysqli_close($conn);
                ?>

            </ul>
        </nav>
    </div>
</header>