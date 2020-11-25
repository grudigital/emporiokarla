<?php
session_start();
if ($_SESSION['usuarioNome'] == '') {
    header("Location: index-acesso-negado.php");
}
?>

<?php include 'includes/header.php' ?>

<body class="fixed-left">
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<div id="wrapper">
    <?php include 'includes/menu.php' ?>
    <div class="content-page">
        <div class="content">
            <div class="topbar">
                <nav class="navbar-custom">
                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">Painel de controle</h3>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ==================
                 PAGE CONTENT START
                 ================== -->

            <div class="page-content-wrapper">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="mini-stat clearfix bg-white">
                                <span style="background-color: #7C4300 !important" class="mini-stat-icon bg-blue-grey mr-0 float-right"><i
                                            class="mdi mdi-package-variant-closed"></i></span>


                                <?php
                                require("connections/conn.php");
                                $sqlanunciantes = "SELECT * FROM itens";
                                $executa_query_anunciantes = mysqli_query($conn, $sqlanunciantes);
                                $conta_linhas_anunciantes = mysqli_num_rows($executa_query_anunciantes);

                                echo "<div class='mini-stat-info'>";
                                echo "<span class='counter text-blue-grey'>$conta_linhas_anunciantes</span>";
                                echo "Produtos cadastrados no site";
                                echo "</div>";
                                ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="mini-stat clearfix bg-white">
                                <span style="background-color: #7C4300 !important" class="mini-stat-icon bg-blue-grey mr-0 float-right"><i
                                            class="mdi mdi-account-check"></i></span>
                                <?php
                                require("connections/conn.php");
                                $sqlprodutos = "SELECT * FROM sugestoes";
                                $executa_query_produtos = mysqli_query($conn, $sqlprodutos);
                                $conta_linhas_produtos = mysqli_num_rows($executa_query_produtos);

                                echo "<div class='mini-stat-info'>";
                                echo "<span class='counter text-blue-grey'>$conta_linhas_produtos</span>";
                                echo "Sugestões enviadas pelo site";
                                echo "</div>";
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>



                        <div class="col-md-6 col-xl-6">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 m-b-30 header-title">Últimos produtos</h4>

                                    <div class="table-responsive">
                                        <table class="table table-vertical mb-0">

                                            <tbody>

                                            <?php
                                            require("connections/conn.php");
                                            $sql = "select i.id iid, i.titulo ititulo, i.categoria icategoria, i.preco ipreco, c.id cid, c.categoria ccategoria from itens as i inner join categorias as c on c.id = i.categoria order by i.id desc limit 5 ";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {


                                                echo "<tr>";
                                                echo "<td>$row[ititulo]</td>";
                                                echo "<td>$row[ccategoria]</td>";
                                                echo "<td>R$ $row[ipreco]</td>";
                                                echo "</tr>";
                                            }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-6">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 m-b-30 header-title">Últimas sugestões</h4>

                                    <div class="table-responsive">
                                        <table class="table table-vertical mb-0">

                                            <tbody>


                                            <?php
                                            require("connections/conn.php");
                                            $sql = "select * from sugestoes order by id desc limit 10";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {


                                                echo "<tr>";
                                                echo "<td>$row[nome]</td>";
                                                echo "<td>$row[telefone]</td>";
                                                echo "<td>$row[dataenvio]</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/rodape.php' ?>
    </div>
</div>
<?php include 'includes/scriptsrodape.php' ?>
</body>
</html>