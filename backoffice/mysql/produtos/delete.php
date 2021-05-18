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
            <input type="text" id="nome" name="nome" placeholder="<?php echo $nome; ?>" maxlength=50 disabled>

            <label for="desc">Descrição</label>
            <input type="text" id="desc" name="desc" placeholder="<?php echo $desc; ?>" maxlength=500 disabled>

            <label for="preco">Preço</label>
            <input type="number" id="preco" name="preco" placeholder="<?php echo $preco; ?>" step="0.01" disabled>

            <p>Imagem</p>
            <img style="height:150px; width:150px;"src="<?php echo "../../../images/uploads/".$img; ?>"><br><br>

            <label for="vis">Visível</label><br>
            <input style="width:25px; height:25px;" type="checkbox" id="vis" name="vis" <?php if ($vis == 1) { echo "checked"; }?> disabled><br>

            <label for="promo">Preço em Promoção</label>
            <input type="number" id="promo" name="promo" placeholder="<?php echo $p_promo; ?>" step="0.01" disabled>

            <label for="categoria">Categoria</label>
            <input type="text" id="desc" name="desc" placeholder="<?php echo $desc; ?>" maxlength=500 disabled>

            <input type="submit" value="Eliminar" name="btnSubmit">
        </form>
    </div>

    <!-- Botão Voltar -->
    <div>
        <a class="voltar" href="list.php">Voltar</a>
    </div>

    <div class="php">

        <?php
        if (isset($_POST["btnSubmit"])) {

            //Alterção de dados se existir
            $query = mysqli_query($con, "DELETE FROM `produtos` WHERE `id_produto` = '$id_produto'") or die(alerta("Erro na eliminação de dados."));
            alerta("Registo apagado com sucesso");
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