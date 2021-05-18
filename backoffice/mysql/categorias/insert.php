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
        <form method="POST" action="insert.php">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Nome..." maxlength=50 required>

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

            $query = mysqli_query($con, "INSERT INTO categorias (nome) VALUES ('$nome')") or die("Erro na expressão");
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