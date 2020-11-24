<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Modulo de seo-->
    <?php
    require("admin/connections/conn.php");
    $sql = "select * FROM seo where id = 1";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<script async src='https://www.googletagmanager.com/gtag/js?id=$row[analytics]'></script>";
        echo "<script>";
        echo "window.dataLayer = window.dataLayer || [];";
        echo "function gtag(){dataLayer.push(arguments);}";
        echo " gtag('js', new Date());";
        echo "gtag('config', '$row[analytics]');";
        echo "</script>";
        echo "<meta name='description' content='$row[description]'>";
        echo "<meta name='keywords' content='$row[keywords]'>";
    }
    ?>

    <meta name="author" content="Grudigital - Felipe Sergio - Lourival Netto - Infosoul">
    <title>Guiadas para o sucesso</title>

    <link rel="icon" href="img/favicon.png" />
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/home_1.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/listing.css" rel="stylesheet">
    <link href="css/product_page.css" rel="stylesheet">
    <link href="css/checkout.css" rel="stylesheet">
    <link href="css/faq.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <link href="css/lightbox.css" rel="stylesheet" />


</head>