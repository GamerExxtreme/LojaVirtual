<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clothing Template, free HTML CSS template</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--
    Template 2062 Clothing 
    http://www.tooplate.com/view/2062-clothing
    -->
    <link href="tooplate_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js">

        /***********************************************
        * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
        * This notice MUST stay intact for legal use
        * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
        ***********************************************/

    </script>

    <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "tooplate_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>

    <link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />

    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
    <script src="js/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>


    <script type="text/javascript">

        $(document).ready(function () {

            $("#carousel").dualSlider({
                auto: false,
                autoDelay: 6000,
                easingCarousel: "swing",
                easingDetails: "easeOutBack",
                durationCarousel: 1000,
                durationDetails: 600
            });

        });


    </script>

    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" />
    <script type="text/JavaScript" src="js/slimbox2.js"></script>

    <!--Scroll btn -->
    <style>
        #myBtn {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Fixed/sticky position */
            bottom: 20px;
            /* Place the button at the bottom of the page */
            right: 30px;
            /* Place the button 30px from the right */
            z-index: 99;
            /* Make sure it does not overlap */
            border: none;
            /* Remove borders */
            outline: none;
            /* Remove outline */
            background-color: white;
            /* Set a background color */
            padding: 5px;
            /* Some padding */
            border-radius: 50%;
            /* Rounded corners */
            font-size: 18px;
            /* Increase font size */
        }

        #myBtn:hover {
            background-color: rgb(182, 181, 181);
            /* Add a dark-grey background on hover */
            cursor: pointer;
        }

        .btntop {
            width: 40px;
            height: 40px;
        }
    </style>

    <?php include "backoffice/dbcon.inc" ?>
</head>

<body>

    <!--Scroll top button-->
    <button onclick="topFunction()" id="myBtn" title="Ir para o topo"><img class="btntop"
            src="images/arrowhead.webp"></button>

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <div id="tooplate_wrapper">
        <div id="tooplate_header">
            <div id="header_top">
                <div id="site_title"><a href="index.php"><img src="images/product/01.jpg"></a>
                </div>
                <div id="tooplate_menu" class="ddsmoothmenu">
                    <ul>
                        <li><a href="index.php" class="selected">Início</a></li>
                        <li><a href="products.php?id=0">Produtos</a>
                            <ul>
                                <?php
                                    $query = "SELECT * FROM `categorias` ORDER BY `nome`";
                                    $resultado = mysqli_query($con,$query) or die("Erro na expressão");

                                    if(mysqli_num_rows($resultado) > 0) {
                                        while($linha = mysqli_fetch_array($resultado)){
                                            ?>
                                                <li><a href="products.php?id=<?php echo $linha['id_categoria']; ?>"><?php echo $linha["nome"] ?></a></li>
                                            <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                        <li><a href="contact.php" class="last">Contatos</a></li>
                    </ul>
                    <br style="clear: left" />
                </div> <!-- end of tooplate_menu -->
            </div> <!-- END of header top -->
        
            <div id="header_bottom">
                <div id="tooplate_search">
                <form action="products.php" method="post">
                        <input type="text" value="" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                    <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn" />
                </form>
                </div>
            </div> <!-- END of header bottom -->
        </div> <!-- END of header -->   

        <div id="tooplate_main"><span class="main_border main_border_t"></span><span
                class="main_border main_border_b"></span>
            <div class="product">
                <h1>Novos Produtos</h1>

                <?php
                    $sql = "SELECT * FROM `produtos` WHERE `visivel`=1 ORDER BY `id_produto` DESC LIMIT 4";
                    $resultado = mysqli_query($con,$sql) or die("Erro na expressão");

                    if(mysqli_num_rows($resultado) > 0) {
                        while($linha = mysqli_fetch_array($resultado)){
                            ?>
                                <div class="product_box">
                                    <div class="img_box"><span></span>
                                        <a href="productdetail.php?id=<?php echo $linha['id_produto']?>"><img style="width:150px; height:138px;"src="images/uploads/<?php echo $linha['imagem']?>" alt="image" /></a>
                                    </div>
                                    <h2><a href="productdetail.php?id=<?php echo $linha['id_produto']?>"><?php echo $linha["nome"] ?></a></h2>
                                    <p class="price" style="color:red;"><b><?php echo $linha["preco_promo"] ?>€</b> 
                                        <?php 
                                            if ($linha["preco_promo"] < $linha["preco"]) {
                                                ?> 
                                                    <s style="color:gray; font-size:20px;"><?php echo $linha["preco"] ?>€</s>
                                                <?php 
                                            }
                                        ?>
                                    </p>
                                </div>
                            <?php
                        }
                    }
                ?>

            </div>

            <div class="clear h20"></div>
            <hr />
            <div class="clear h10"></div>

            <div class="product">
                <h1>Mais Baratos</h1>
                <?php
                    $sql = "SELECT * FROM `produtos` ORDER BY `preco_promo`";
                    $resultado = mysqli_query($con,$sql) or die("Erro na expressão");

                    if(mysqli_num_rows($resultado) > 0) {
                        while($linha = mysqli_fetch_array($resultado)){
                            ?>
                                <div class="product_box">
                                    <div class="img_box"><span></span>
                                        <a href="productdetail.php?id=<?php echo $linha['id_produto']?>"><img style="width:150px; height:138px;"src="images/uploads/<?php echo $linha['imagem']?>" alt="image" /></a>
                                    </div>
                                    <h2><a href="productdetail.php?id=<?php echo $linha['id_produto']?>"><?php echo $linha["nome"] ?></a></h2>
                                    <p class="price" style="color:red;"><b><?php echo $linha["preco_promo"] ?>€</b> 
                                        <?php 
                                            if ($linha["preco_promo"] < $linha["preco"]) {
                                                ?> 
                                                    <s style="color:gray; font-size:20px;"><?php echo $linha["preco"] ?>€</s>
                                                <?php 
                                            }
                                        ?>
                                    </p>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>

            <div class="clear"></div>
        </div> <!-- END of main -->
        <div id="tooplate_bottom_wrapper">
            <div id="tooplate_bottom">
                <a href="backoffice/index.php"><h4>Backoffice</h4></a>
            </div> <!-- END of bottom -->
        </div> <!-- END of bottom wrapper -->
    </div> <!-- END of wrapper -->
</body>

</html>