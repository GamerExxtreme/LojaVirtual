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

            <label for="login">Login</label>
            <input type="text" id="login" name="login" placeholder="Login..." maxlength=10 required>

            <label for="pw">Password</label>
            <input type="password" id="pw" name="pw" placeholder="Password..." maxlength=12 required>

            <label for="poder">Poder</label>
            <input type="number" id="poder" name="poder" value="1" min="1" max="10" placeholder="Poder..." required>

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
            $login = $_POST["login"];
            $pw = $_POST["pw"];
            $poder = $_POST["poder"];

            $query = mysqli_query($con, "INSERT INTO utilizadores (nome, login, pw, poder) VALUES ('$nome','$login','$pw','$poder')") or die("Erro na expressão");
            mysqli_close($con);
            echo "Registo inserido com sucesso.";
        }
        ?>
    </div>

</body>

</html>