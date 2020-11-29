<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'includes/head.php'; ?>

<style>
    .quantity {

        margin-top: 0px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button
    {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number]
    {
        -moz-appearance: textfield;
    }

    .quantity input {
        width: 80px;
        height: 42px;
        line-height: 1.65;
        float: left;
        display: block;
        margin: 0;
        border: 1px solid #eee;
        padding-right: -10px;
        margin-left: -35px;
    }

    .quantity input:focus {
        outline: 0;
    }

    .quantity-nav {
        float: left;
        position: relative;
        height: 42px;
    }

    .quantity-button {
        position: relative;
        cursor: pointer;
        border-left: 1px solid #eee;
        width: 20px;
        text-align: center;
        color: #333;
        font-size: 13px;
        padding-right: 0px;
        font-family: "Trebuchet MS", Helvetica, sans-serif !important;
        line-height: 1.7;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    .quantity-button.quantity-up {
        position: absolute;
        height: 50%;
        top: 0;
        border-bottom: 1px solid #eee;
    }

    .quantity-button.quantity-down {
        position: absolute;
        bottom: -1px;
        height: 50%;
    }
</style>

<script>
    window.console = window.console || function(t) {};
</script>



<script>
    if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
    }
</script>

<body style="background-color:#F1D400 !important">
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
<section id="menu" style="background-image: url('images/fundoamadeirado.jpg')" class="section menu">

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
                        echo "<input type='hidden' name='pedido' value='$pegaid'>";
                        echo "<input type='hidden' name='loja' value='$rowpegaloja[loja]'>";
                        echo "<input type='hidden' name='item' value='$row3[id]'>";
                        echo "<input type='hidden' name='valor' value='$row3[preco]'>";
                        echo "<li>$row3[titulo]<div class='detail'>$row3[descricao]<span class='price'>R$ $row3[preco]</span></div>";
                        echo "<div class='container'>";
                        echo "<div style='margin-top: 20px; margin-left:2px' class='row'>";
                        echo "<div class='quantity'><input min='1' name='quantidade' max='9' step='1' value='1' type='number'></div>";
                        echo "<div class=''></div>";
                        echo "<div class='quantity'><button style='font-size: 14px; margin-left: 20px; height: 42px; width: 100px; border: none; color:#fff; background-color: #7C4414'>Adicionar</button></div>";
                        echo "</div>";
                        echo "</div>";






                        echo "</li>";
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
<script>
    (function() {
        'use strict';

        function ctrls() {
            var _this = this;

            this.counter = 0;
            this.els = {
                decrement: document.querySelector('.ctrl__button--decrement'),
                counter: {
                    container: document.querySelector('.ctrl__counter'),
                    num: document.querySelector('.ctrl__counter-num'),
                    input: document.querySelector('.ctrl__counter-input')
                },
                increment: document.querySelector('.ctrl__button--increment')
            };

            this.decrement = function() {
                var counter = _this.getCounter();
                var nextCounter = (_this.counter > 0) ? --counter : counter;
                _this.setCounter(nextCounter);
            };

            this.increment = function() {
                var counter = _this.getCounter();
                var nextCounter = (counter < 9999999999) ? ++counter : counter;
                _this.setCounter(nextCounter);
            };

            this.getCounter = function() {
                return _this.counter;
            };

            this.setCounter = function(nextCounter) {
                _this.counter = nextCounter;
            };

            this.debounce = function(callback) {
                setTimeout(callback, 100);
            };

            this.render = function(hideClassName, visibleClassName) {
                _this.els.counter.num.classList.add(hideClassName);

                setTimeout(function() {
                    _this.els.counter.num.innerText = _this.getCounter();
                    _this.els.counter.input.value = _this.getCounter();
                    _this.els.counter.num.classList.add(visibleClassName);
                }, 100);

                setTimeout(function() {
                    _this.els.counter.num.classList.remove(hideClassName);
                    _this.els.counter.num.classList.remove(visibleClassName);
                }, 200);
            };

            this.ready = function() {
                _this.els.decrement.addEventListener('click', function() {
                    _this.debounce(function() {
                        _this.decrement();
                        _this.render('is-decrement-hide', 'is-decrement-visible');
                    });
                });

                _this.els.increment.addEventListener('click', function() {
                    _this.debounce(function() {
                        _this.increment();
                        _this.render('is-increment-hide', 'is-increment-visible');
                    });
                });

                _this.els.counter.input.addEventListener('input', function(e) {
                    var parseValue = parseInt(e.target.value);
                    if (!isNaN(parseValue) && parseValue >= 0) {
                        _this.setCounter(parseValue);
                        _this.render();
                    }
                });

                _this.els.counter.input.addEventListener('focus', function(e) {
                    _this.els.counter.container.classList.add('is-input');
                });

                _this.els.counter.input.addEventListener('blur', function(e) {
                    _this.els.counter.container.classList.remove('is-input');
                    _this.render();
                });
            };
        };

        // init
        var controls = new ctrls();
        document.addEventListener('DOMContentLoaded', controls.ready);
    })();
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46156385-1', 'cssscript.com');
    ga('send', 'pageview');

</script>

<?php include 'includes/footer.php'; ?>

<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->

<script id="rendered-js" >
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
    //# sourceURL=pen.js
</script>


</body>
</html>
