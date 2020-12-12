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
                            <h3 class="page-title">Painel de gerenciamento :: Produtos :: Editar</h3>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div>
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <form class="card-body" action="functions/produtos_editar.php"
                                      enctype="multipart/form-data"
                                      method="post">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-4">
                                                <h4 class="mt-0 header-title">Produtos</h4>
                                                <p class="text-muted m-b-30 font-14">Editar produto</p>
                                            </div>
                                            <div class="col-6"></div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    require("connections/conn.php");
                                    $pegaid = (int)$_GET['id'];
                                    $sql = "select * FROM itens where id = '$pegaid'";
                                    $result = mysqli_query($conn, $sql);


                                    $sqlcategoriaselecionada = "select i.id iid, i.categoria icategoria, c.id cid, c.categoria ccategoria from itens as i inner join categorias as c on i.categoria = c.id where i.id = '$pegaid'";
                                    $resultcategoriaselecionada = mysqli_query($conn,$sqlcategoriaselecionada);

                                    $sqlcategorias = "select id, categoria from categorias";
                                    $resultcategorias = mysqli_query($conn, $sqlcategorias);



                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<input class='form-control' name='id' type='hidden' value='$row[id]'
                                                   id='example-text-input'>";

                                        echo "<div class='form-group row'>";
                                        echo "<label for='example-text-input' class='col-sm-2 col-form-label'>Título</label>";
                                        echo "<div class='col-sm-10'>";
                                        echo "<input class='form-control' name='titulo' type='text' value='$row[titulo]'
                                                   id='example-text-input'>";
                                        echo "</div>";
                                        echo "</div>";

                                        echo "<div class='form-group row'>";
                                        echo "<label for='example-text-input' class='col-sm-2 col-form-label'>Ordem</label>";
                                        echo "<div class='col-sm-10'>";
                                        echo "<input class='form-control' name='ordem' type='number' value='$row[ordem]'
                                                   id='example-text-input'>";
                                        echo "</div>";
                                        echo "</div>";


                                        echo "<div class='form-group row'>";
                                        echo "<label for='example-text-input' class='col-sm-2 col-form-label'>Categoria</label>";
                                        echo "<div class='col-sm-10'>";
                                        echo "<select name='categoria' class='form-control'>";

                                        //Retorno da categoria selecionada
                                        while ($retornocategoriaselecionada = mysqli_fetch_array($resultcategoriaselecionada)){
                                            echo "<option style='background-color: #263238; color: #fff' selected value='$retornocategoriaselecionada[cid]'>$retornocategoriaselecionada[ccategoria]</option>";
                                        }
                                        //Retorno da categoria selecionada


                                        //Retorno todas categorias
                                        while ($retornocategorias = mysqli_fetch_array($resultcategorias)){
                                            echo "<option value='$retornocategorias[id]'>$retornocategorias[categoria]</option>";
                                        }
                                        //Retorno todas categorias

                                        echo "</select>";
                                        echo "</div>";
                                        echo "</div>";




                                        echo "<div class='form-group row'>";
                                        echo "<label for='example-text-input' class='col-sm-2 col-form-label'>Descrição</label>";
                                        echo "<div class='col-sm-10'>";
                                        echo "<input class='form-control' name='descricao' type='text' value='$row[descricao]'
                                                   id='example-text-input'>";
                                        echo "</div>";
                                        echo "</div>";

                                        echo "<div class='form-group row'>";
                                        echo "<label for='example-text-input' class='col-sm-2 col-form-label'>Preço</label>";
                                        echo "<div class='col-sm-10'>";
                                        echo "<input class='form-control' name='preco' type='text' value='$row[preco]'
                                                   id='example-text-input'>";
                                        echo "</div>";
                                        echo "</div>";


                                    }
                                    mysqli_close($conn);
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button style="float: right" type='submit' class='btn btn-info'>Atualizar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
    <?php include 'includes/rodape.php' ?>
</div>
</div>
<?php include 'includes/scriptsrodape.php' ?>
</body>
</html>