<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clothing Template, Contact</title>
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

<?php include "backoffice/dbcon.inc"; ?>
</head>
<body>

<div id="tooplate_wrapper">
	<div id="tooplate_header">
    	<div id="header_top">
        	<div id="site_title"><a href="#">Clothing Template</a></div>
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
    
    <div id="tooplate_main"><span class="main_border main_border_t"></span><span class="main_border main_border_b"></span>
    	
        <div class="col col_1">
	        <h1 class="wpadding">Contact</h1>
            <p>Deixa-nos o teu feedback acerca do nosso website. Sugestões, críticas são sempre bem-vindas.</p>
		</div>
        <div class="col col_2">
        	
        	<div id="contact_form">
                <h2>Escreve a tua mensagem</h2>
                <form method="post" name="contact" action="#">
                    <label for="author">Nome:</label> <input type="text" id="author" name="author" class="input_field" />
                    <label for="email">Email:</label> <input type="text" id="email" name="email" class="input_field" />
                    <label for="subject">Assunto:</label> <input type="text" id="subject" name="subject" class="input_field" />
                    <label for="text">Mensagem:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <input type="submit" name="Submit" value="Enviar" class="submit_btn" />
                </form>
            </div>
        </div>
        
        <div class="col col_2">
        	<h2>O Nosso Endereço</h2>
            <div class="col_4 left">
            R. Pádua Correia 166,<br />
            Vila Nova de Gaia,<br />
            4430-999 <br /><br />
            
            Tel: 22 375 4007<br />
			</div>

            <div class="clear h30"></div>
            <div class="img_border img_border_b">
            <iframe width="421" height="210" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJCe3aGdFkJA0RGcfjH1G72ZY&key=AIzaSyCYnbayrrTwRRTr3sEI2Fx_uBRwtaIDJmY"></iframe></div>    
            <br /><small><a target="_blank" href="https://www.google.com/maps?ll=41.1261,-8.608929&z=16&t=m&hl=pt-PT&gl=US&mapclient=embed&cid=10869925132737169177" style="color:#0000FF;text-align:left">Ver Mapa Maior</a></small>
        </div>
    	
		<div class="clear"></div>
            
        <div class="clear"></div>
    </div> <!-- END of main -->
    
</div> <!-- END of wrapper -->

</body>
</html>