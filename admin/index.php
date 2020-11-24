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
                            <h3 class="page-title">Management panel</h3>
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

                    <!--<div style="background-color: #000; height: 200px; width: 100%">-->
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i
                                            class="mdi mdi-account-check"></i></span>

                                <?php
                                require("connections/conn.php");
                                $sqlanunciantes = "SELECT * FROM anunciantes";
                                $executa_query_anunciantes = mysqli_query($conn, $sqlanunciantes);
                                $conta_linhas_anunciantes = mysqli_num_rows($executa_query_anunciantes);

                                echo "<div class='mini-stat-info'>";
                                echo "<span class='counter text-blue-grey'>$conta_linhas_anunciantes</span>";
                                echo "Anunciantes cadastrados no site";
                                echo "</div>";
                                ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i
                                            class="mdi mdi-package-variant-closed"></i></span>
                                <?php
                                require("connections/conn.php");
                                $sqlprodutos = "SELECT * FROM produtos";
                                $executa_query_produtos = mysqli_query($conn, $sqlprodutos);
                                $conta_linhas_produtos = mysqli_num_rows($executa_query_produtos);

                                echo "<div class='mini-stat-info'>";
                                echo "<span class='counter text-blue-grey'>$conta_linhas_produtos</span>";
                                echo "Produtos cadastrados no site";
                                echo "</div>";
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i
                                            class="mdi mdi-comment"></i></span>
                                <?php
                                require("connections/conn.php");
                                $sqlcomentarios = "SELECT * FROM anunciantes_comentarios";
                                $executa_query_comentarios = mysqli_query($conn, $sqlcomentarios);
                                $conta_linhas_comentarios = mysqli_num_rows($executa_query_comentarios);

                                echo "<div class='mini-stat-info'>";
                                echo "<span class='counter text-blue-grey'>$conta_linhas_comentarios</span>";
                                echo "Comentários em anúncios";
                                echo "</div>";
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i
                                            class="mdi mdi-contact-mail"></i></span>
                                <?php
                                require("connections/conn.php");
                                $sqlorcamentos = "SELECT * FROM anunciantes_orcamento";
                                $executa_query_orcamentos = mysqli_query($conn, $sqlorcamentos);
                                $conta_linhas_orcamentos = mysqli_num_rows($executa_query_orcamentos);

                                echo "<div class='mini-stat-info'>";
                                echo "<span class='counter text-blue-grey'>$conta_linhas_orcamentos</span>";
                                echo "Orçamentos em anúncios";
                                echo "</div>";
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 m-b-30 header-title">Últimos anunciantes ativos</h4>

                                    <div class="table-responsive">
                                        <table class="table table-vertical mb-0">

                                            <tbody>

                                            <?php
                                            require("connections/conn.php");
                                            $sql = "select a.id aid, a.titulo atitulo, a.categoria acategoria, a.datacadastro adatacadastro, ac.id acid, ac.categoria accategoria from anunciantes as a inner join anunciantes_categoria as ac on a.categoria = ac.id where a.status = 1 order by a.id desc limit 7";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {


                                                echo "<tr>";
                                                echo "<td>$row[atitulo]</td>";
                                                echo "<td>$row[accategoria]</td>";
                                                echo "<td>$row[adatacadastro]</td>";
                                                echo "</tr>";
                                            }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 m-b-30 header-title">últimos contatos</h4>

                                    <div class="table-responsive">
                                        <table class="table table-vertical mb-0">

                                            <tbody>


                                            <?php
                                            require("connections/conn.php");
                                            $sql = "select * from contatos order by id desc limit 10";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {


                                                echo "<tr>";
                                                echo "<td>$row[nome]</td>";
                                                echo "<td>$row[telefone]</td>";
                                                echo "<td>$row[datacontato]</td>";
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