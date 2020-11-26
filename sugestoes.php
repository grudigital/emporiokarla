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

<section id="reservations" class="section reservations">
    <div class="container">
        <div class="jt_row jt_row-fluid row">
            <div class='col-md-12 jt_col column_container'>
                <div class='voffset100'></div>
                <h2 class='section-title'>Sugestões</h2>
            </div>
            <div class='col-md-6 col-md-offset-3 jt_col column_container'>
                <div class='section-subtitle'>
                Preencha os campos abaixo para fazer uma sugestão
                </div>
            </div>

            <form action="functions/enviarsugestao.php" method="post" enctype="multipart/form-data" class="contact-form">
                <div class="col-md-5 col-md-offset-1 jt_col column_container">
                    <p>Nome</p>
                    <input type="text" name="nome" placeholder="Nome" class="text" >
                </div>

                <?php
                require("admin/connections/conn.php");
                $pegaid = (int)$_GET['id'];
                $sqlpegaloja = "select * from pedidos where pedido = $pegaid group by pedido";
                $resultpegaloja = mysqli_query($conn, $sqlpegaloja);
                while ($rowpegaloja = mysqli_fetch_assoc($resultpegaloja)) {
                    echo "<input name='loja' type='hidden' value='$rowpegaloja[loja]'>";
                }
                mysqli_close($conn);
                ?>

                <div class="col-md-5 jt_col column_container">
                    <p>Telefone</p>
                    <input type="text" name="telefone" placeholder="Telefone" class="text" >
                </div>

                <div class="col-md-10 col-md-offset-1 jt_col column_container">
                    <textarea name="mensagem" class="text" placeholder="Mensagem" rows="6"></textarea>
                </div>
                <div style="margin-bottom: 30px" class="col-md-4 col-md-offset-4 jt_col column_container">
                    <input type="submit" class="button center" value="Enviar sugestão" >
                </div>
            </form>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>