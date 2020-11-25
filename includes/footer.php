
<?php
require("admin/connections/conn.php");
$sql = "select * FROM informacoes where id = 1";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {


echo "<footer id='footer' class='section' role='contentinfo'>";
    echo "<div class='container'>";
        echo "<ul class='social'>";
            echo "<li><a target='_blank' href='$row[facebook]' class='icon fb'><i class='fa fa-facebook'></i></a></li>";
    echo "<li><a target='_blank' href='$row[instagram]' class='icon tw'><i class='fa fa-instagram'></i></a></li>";

    echo "</ul>";
        echo "</div>";
    echo "</footer>";

}
mysqli_close($conn);
?>





<a href="#0" class="cd-top">Top</a>

<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.js"></script>
<script src="js/classie.js"></script>
<script src="js/pathLoader.js"></script>
<script src="js/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.inview.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.mb.YTPlayer.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/default.js"></script>
<script src="js/plugins.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.swipebox.js"></script>

<script type="text/javascript">
    ;( function( $ ) {

        $( '.swipebox' ).swipebox();

    } )( jQuery );
</script>