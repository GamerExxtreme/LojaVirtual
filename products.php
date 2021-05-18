<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clothing Template, Products</title>
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
    
    $(document).ready(function() {
        
        $("#carousel").dualSlider({
            auto:false,
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
<?php 
    include "backoffice/dbcon.inc";
    $flag = false;
?>
</head>
<body>

<div id="tooplate_wrapper">
<div id="tooplate_header">
            <div id="header_top">
                <div id="site_title"><a href="index.php"><p>Home Clothing</p></a>
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
                        <?php
                            if (isset($_POST["Search"])) {
                                $pesquisa = $_POST["keyword"];
                            }
                        ?>
                    </form>
                </div>
            </div> <!-- END of header bottom -->
        </div> <!-- END of header -->   
    
    <div id="tooplate_main"><span class="main_border main_border_t"></span><span class="main_border main_border_b"></span>

        <h1>Pesquisa Avançada:</h1>
        <form method="post">

            <label for="nome">Nome: </label><input type="text" id="nome" name="nome" class="input_field" />
            <label for="desc">Descrição: </label><input type="text" id="desc" name="desc" class="input_field" />

            <label for="categoria" class="espacamento">Categoria: </label>
            <select name="categoria" id="categoria" required class="select_pesquisa">
                <option value="" disabled="disabled" >Selecione Categoria</option>
                <option value="" selected>Todas</option>
                <?php

                    $query = "SELECT * FROM `categorias` ORDER BY `nome`";
                    $resultado = mysqli_query($con,$query) or die("Erro na expressão");

                    if(mysqli_num_rows($resultado) > 0) {
                        $cont = 0;
                        while($linha = mysqli_fetch_array($resultado)){
                            ?>
                                <option value="<?php echo $linha["id_categoria"] ?>"><?php echo $linha["nome"] ?></option>
                            <?php
                        }
                    }

                ?>
            </select>

            <label for="ordenacao" class="espacamento">Ordenação Alfabética: </label>
            <select id="ordenacao" name="ordenacao" required class="select_pesquisa">
                <option value="" disabled>Ordenação Alfabética</option>
                <option value="0" selected>Não</option>
                <option value="1">A - Z</option>
                <option value="2">Z - A</option>
            </select>

            <label for="ordenacao_num" class="espacamento">Ordenação Preçária: </label>
            <select id="ordenacao_num" name="ordenacao_num" required class="select_pesquisa">
                <option value="" disabled>Ordenação Preçária</option>
                <option value="0" selected>Não</option>
                <option value="1">€ - €€€</option>
                <option value="2">€€€ - €</option>
            </select>

            <br>
            <input type="submit" name="pesq" value="Pesquisar" class="submit_btn" />
        </form>

        <?php

            if (isset($_POST["pesq"])) {
                $flag = true;
            }

        ?>

        <hr />
    	<div class="product">
        	
            <?php
                    if ($flag) {

                        $nome = $_POST["nome"];
                        $desc = $_POST["desc"];

                        if ($_POST["categoria"] != "") {
                            $cat = $_POST["categoria"];
                        } else { 
                            $cat = 0;
                        }

                        $ordem_a = $_POST["ordenacao"];
                        $ordem_n = $_POST["ordenacao_num"];

                        if ($cat == 0) {
                            $sqlb = "SELECT * FROM `produtos` WHERE `visivel`=1";
                        } else {
                            $sqlb = "SELECT * FROM `produtos` WHERE `id_categoria`='$cat' AND `visivel`=1";
                        }

                        if ($ordem_a == 1) {
                            $sqla = $sqlb . " AND `nome` LIKE '%".$nome."%' AND `descricao` LIKE '%".$desc."%' ORDER BY `nome` ASC";
                        } else if ($ordem_a == 2) {
                            $sqla = $sqlb . " AND `nome` LIKE '%".$nome."%' AND `descricao` LIKE '%".$desc."%' ORDER BY `nome` DESC";
                        } else if ($ordem_a == 0) {
                            $sqla = $sqlb . " AND `nome` LIKE '%".$nome."%' AND `descricao` LIKE '%".$desc."%'";
                        }

                        if ($ordem_a == 0) {
                            if ($ordem_n == 1) {
                                $sql = $sqla . " ORDER BY `preco_promo` ASC";
                            } else if ($ordem_n == 2) {
                                $sql = $sqla . " ORDER BY `preco_promo` DESC";
                            } else if ($ordem_n == 0) {
                                $sql = $sqla;
                            }
                        } else if ($ordem_a > 0) {
                            if ($ordem_n == 1) {
                                $sql = $sqla . ", `preco_promo` ASC";
                            } else if ($ordem_n == 2) {
                                $sql = $sqla . ", `preco_promo` DESC";
                            } else if ($ordem_n == 0) {
                                $sql = $sqla;
                            }
                        }
                            
                        /*echo $sql;
                        die();*/
                        ?>
                            <h1>Resultados da Pesquisa:</h1>
                        <?php
                    } else {
                        if (isset($_GET['id'])) {
                            $id_cat = $_GET['id'];
                            if ($id_cat==0) {
                                $sql = "SELECT * FROM `produtos` WHERE `visivel`=1 ORDER BY `id_produto`";
                                ?>
                                    <h1>Todos os Produtos</h1>
                                <?php
                            } else {
                                $sql = "SELECT * FROM `produtos` WHERE `id_categoria`='$id_cat' AND `visivel`=1 ORDER BY `id_produto`";
        
                                $get_cat = mysqli_query($con, "SELECT `nome` FROM `categorias` WHERE `id_categoria`='$id_cat'");
                                $linha_cat = mysqli_fetch_array($get_cat);
                                ?>
                                    <h1>Produtos da Categoria <?php echo $linha_cat["nome"] ?></h1>
                                <?php

                            }
                        } else {
                            if (!(isset($pesquisa))) {
                                $pesquisa = $_GET["search"];
                            }
                            ?>
                                <h1>Resultados da Pesquisa: <?php echo $pesquisa?></h1>
                            <?php
                            $sql = "SELECT * FROM `produtos` WHERE `nome` LIKE '%".$pesquisa."%' OR `descricao` LIKE '%".$pesquisa."%' AND `visivel`=1 ORDER BY `id_produto`";
                        }
                    }

                    
                    $resultado = mysqli_query($con,$sql) or die("Erro na expressão de select");

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
                    } else {


                    }
                ?>
		</div>
        
        <hr />
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