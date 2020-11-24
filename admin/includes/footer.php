<footer class="revealed">
    <div class="container">

        <div class="row add_bottom_25">
            <div class="col-lg-8">
                <ul style="float:left" class="additional_links">
                    <li style="color: #fff"><a href="termos-de-uso.php">Termos de uso</a></li>
                    <li style="color: #fff"><a href="politica-de-privacidade.php">Política de privacidade</a></li>
                    <li style="color: #fff"><span>© 2020 Guiadas para o sucesso</span></li>
                    <li style="color: #fff">Desenvolvido por: <a href="http://www.grudigital.com.br">Agência
                            Grudigital</a></li>
                </ul>
            </div>
            <?php
            require("admin/connections/conn.php");
            $sql = "select id, telefone,email,instagram,facebook,telegram,youtube FROM informacoes where id = 1";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div class='col-lg-4'>";
                echo "<ul style='float: right' class='footer-selector clearfix'>";
                echo "<a target='_blank' href='$row[facebook]'><img style='float: left; width: 30px; margin-left:10px'  src='data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' data-src='img/icone-facebook.png' alt='' class='lazy'></a>";
                echo "<a target='_blank' href='$row[instagram]'><img style='float: left; width: 30px; margin-left:10px'  src='data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' data-src='img/icone-instagram.png' alt='' class='lazy'></a>";
                echo "<a target='_blank' href='$row[telegram]'><img style='float: left; width: 30px; margin-left:10px'  src='data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' data-src='img/icone-telegram.png' alt='' class='lazy'></a>";
                echo "<a target='_blank' href='$row[youtube]'><img style='float: left; width: 30px; margin-left:10px'  src='data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' data-src='img/icone-youtube.png' alt='' class='lazy'></a>";
                echo "</ul>";
                echo "</div>";

            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</footer>