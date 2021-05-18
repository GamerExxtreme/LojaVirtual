<?php session_start(); ?>
<html>
    <head>
        <title>BackOffice - Login</title>
        <link rel="stylesheet" type="text/css" media="all" href="login.css"/>
        <meta charset="utf-8">
        <?php
            include 'dbcon.inc';
        ?>
    </head>

    <body>

        <form method="POST" class="login-form">
            <p class="login-text">
                <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-lock fa-stack-1x"></i>
                </span>
            </p>
            <input type="text" class="login-username" autofocus="true" required="true" name="login" placeholder="Username" />
            <input type="password" class="login-password" required="true" name="password" placeholder="Password" />
            <input type="submit" name="btnSubmit" value="Login" class="login-submit" />
        </form>
        <div class="underlay-photo"></div>
        <div class="underlay-black"></div>

        <?php

            if (isset($_POST["btnSubmit"])) {

                $user = $_POST["login"];
                $pw = $_POST["password"];
                //Verificar registo na base de dados

                $query = "SELECT * FROM `utilizadores` WHERE `login` = '$user' AND `pw` = '$pw'";
                $resultado = mysqli_query($con, $query);
                mysqli_close($con);
                if (mysqli_num_rows($resultado) == 1) { 
                    $linha = mysqli_fetch_array($resultado);
                    $_SESSION["nome"] = $linha["nome"];
                    $_SESSION["id"] = $linha["id"];
                    $_SESSION["poder"] = $linha["poder"];
                    ob_start();
                    header('Location: backoffice.php');
                    ob_end_flush();
                    die();
                } else {
                    alerta("Utilizador ou password inválidos! \\nTente novamente.");
                    header("Refresh:0");
                    die();
                }
            }
    
            function alerta($msg)
            {
                echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }

        ?>

    </body>
</html>