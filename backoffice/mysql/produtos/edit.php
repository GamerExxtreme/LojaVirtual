<!DOCTYPE html>
<?php
    session_start();
?>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="all" href="../../style.css"/>
    <?php
    include '../../dbcon.inc';
    ?>
</head>

<body>

    <?php 
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];

            $lista = mysqli_query($con, "SELECT * FROM `produtos` WHERE id_produto='$id'") or die("Erro na expressão de seleção");

            if (mysqli_num_rows($lista) == 1 ) {
                $n = mysqli_fetch_array($lista);
                $id_produto = $n["id_produto"];
                $nome = $n["nome"];
                $desc = $n["descricao"];
                $preco = $n["preco"];
                $img = $n["imagem"];
                $vis = $n["visivel"];
                $p_promo = $n["preco_promo"];
                $id_cat = $n["id_categoria"];
            }
        }
    ?>


    <div class="form">
        <form method="POST" enctype="multipart/form-data">
            <label for="id">ID Produto</label>
            <input type="text" id="nome" name="nome" placeholder="<?php echo $n["id_produto"]; ?>" maxlength=50 disabled>

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="<?php echo $nome; ?>" maxlength=50>

            <label for="desc">Descrição</label>
            <input type="text" id="desc" name="desc" placeholder="<?php echo $desc; ?>" maxlength=500>

            <label for="preco">Preço (€)</label>
            <input type="number" id="preco" name="preco" placeholder="<?php echo $preco; ?>" step="0.01">

            <label for="img">Imagem</label>
            <input type="file" id="img" name="photo" placeholder="<?php echo $img; ?>">

            <label for="vis">Visível</label><br>
            <input style="width:25px; height:25px;" type="checkbox" id="vis" name="vis" <?php if ($vis == 1) { echo "checked"; }?>><br>

            <label for="promo">Preço em Promoção (€)</label>
            <input type="number" id="promo" name="promo" placeholder="<?php echo $p_promo; ?>" step="0.01">

            <label for="categoria">Categoria</label>
            <select id="categoria" name='categoria' required>

            <?php

                $query = "SELECT * FROM `categorias` ORDER BY `nome`";
                $resultado = mysqli_query($con,$query) or die("Erro na expressão");



                if(mysqli_num_rows($resultado) > 0) {
                    while($linha = mysqli_fetch_array($resultado)){
                        if ($id_cat == $linha["id_categoria"]) { 
                            $flag = 1;
                        } else { 
                            $flag = 0;
                        }

                        ?>
                            <option <?php if ($flag==1) {echo "selected='selected'"; }?>value="<?php echo $linha["id_categoria"] ?>"><?php echo $linha["nome"] ?></option>
                        <?php
                    }
                }
            ?>
            </select>

            <input type="submit" value="Alterar" name="btnSubmit">
        </form>
    </div>

    <div class="php">
        <p>Imagem Atual:</p>
        <img style="height:150px; width:150px;"src="<?php echo "../../../images/uploads/".$img; ?>">
    </div>

    <!-- Botão Voltar -->
    <div>
        <a class="voltar" href="list.php">Voltar</a>
    </div>

    <div class="php">

        <?php
        if (isset($_POST["btnSubmit"])) {

            //verificação dos campos preenchidos
            if ($_POST["nome"]) { $nomen = $_POST["nome"]; } else { $nomen = $n["nome"]; }
            if ($_POST["desc"]) { $descn = $_POST["desc"]; } else { $descn = $n["descricao"]; }
            if ($_POST["preco"]) { $precon = $_POST["preco"]; } else { $precon = $n["preco"]; }
            
            // Visibilidade
            if (isset($_POST["vis"])) {
                $visn = 1;
            } else {
                $visn = 0;
            }

            if ($_POST["promo"]) { $promon = $_POST["promo"]; } else { $promon = $n["preco_promo"]; }

            if ($promon > $precon) {
                alerta("O preço de promoção não pode ser maior que o preço original");
                die();
            }

            if ($_POST["categoria"]) { $catn = $_POST["categoria"]; } else { $catn = $n["id_categoria"]; }

            // Fotografia
            if (isset($_FILES["photo"])) {
                $nome_temp = $_FILES["photo"]["tmp_name"];
                $nome_real = $_FILES["photo"]["name"];
                if ($nome_real != "") {
                    copy($nome_temp, "../../../images/uploads/".$nome_real);
                }
            }

            if ($nome_real == "") {
                $nome_real = $img;
            }
        

            $query = mysqli_query($con, "UPDATE `produtos` SET `nome`='$nomen', `descricao`='$descn', `preco`='$precon', `imagem`='$nome_real', `visivel`='$visn', `preco_promo`='$promon', `id_categoria`='$catn' WHERE `id_produto`='$id_produto'") or die(alerta("Erro na expressão de alterar"));
            mysqli_close($con);
            alerta("Registo alterado com sucesso!");
            header('Refresh:0 URL=list.php');
            die();
        }


        function alerta($msg)
        {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        ?>
    </div>
</body>

</html>