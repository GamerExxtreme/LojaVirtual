<!DOCTYPE html>
<html>

<head>
    <title>Ficha 06 - Exe 1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="all" href="../../style.css"/>
    <?php
    include '../../dbcon.inc';
    ?>
</head>

<body>

    <div class="form">
        <form method="POST" enctype="multipart/form-data">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Nome..." maxlength=50 required>

            <label for="desc">Descrição</label>
            <input type="text" id="desc" name="desc" placeholder="Descrição..." maxlength=500 required>

            <label for="preco">Preço</label>
            <input type="number" id="preco" name="preco" placeholder="Preço..." step="0.01" required>

            <label for="img">Imagem</label>
            <input type="file" id="img" name="photo" placeholder="Imagem do Produto..." required>

            <label for="vis">Visível</label><br>
            <input style="width:25px; height:25px;" type="checkbox" id="vis" name="vis"><br>

            <label for="promo">Preço em Promoção</label>
            <input type="number" id="promo" name="promo" placeholder="Promoção..." step="0.01" required>

            <label for="nome">Categoria</label>
            <select name='categoria' required>

            <?php

                $query = "SELECT * FROM `categorias` ORDER BY `nome`";
                $resultado = mysqli_query($con,$query) or die("Erro na expressão");

                if(mysqli_num_rows($resultado) > 0) {
                    while($linha = mysqli_fetch_array($resultado)){
                        ?>
                            <option value="<?php echo $linha["id_categoria"] ?>"><?php echo $linha["nome"] ?></option>
                        <?php
                    }
                }
            ?>
            </select>

            <input type="submit" value="Adicionar" name="btnSubmit">
        </form>
    </div>

    <!-- Botão Voltar -->
    <div>
        <a class="voltar" href="list.php">Voltar</a>
    </div>

    <div class="php">

        <?php

        if (isset($_POST["btnSubmit"])) {

            $nome = $_POST["nome"];
            $desc = $_POST["desc"];
            $preco = $_POST["preco"];
            
            // Visibilidade
            if (isset($_POST["vis"])) {
                $vis = 1;
            } else {
                $vis = 0;
            }

            $promo = $_POST["promo"];
            $cat = $_POST["categoria"];

            // Preço
            if ($promo > $preco) {
                alerta("O preço de promoção não pode ser maior que o preço original");
                die();
            }

            // Fotografia
            if (isset($_FILES["photo"])) {
                $nome_temp = $_FILES["photo"]["tmp_name"];
                $nome_real = $_FILES["photo"]["name"];
                if ($nome_real != "") {
                    copy($nome_temp, "../../../images/uploads/".$nome_real);
                }
            }

            $query = mysqli_query($con, "INSERT INTO `produtos`(`nome`, `descricao`, `preco`, `imagem`, `visivel`, `preco_promo`, `id_categoria`) VALUES ('$nome', '$desc', '$preco', '$nome_real','$vis', '$promo', '$cat')") or die(alerta("Erro na expressão de inserir"));
            mysqli_close($con);
            alerta ("Registo inserido com sucesso.");
            header("Refresh:0.1; URL=list.php");
        }

        function alerta($msg)
        {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        ?>
    </div>

</body>

</html>