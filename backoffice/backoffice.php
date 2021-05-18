<?php session_start(); ?>
<html>
    <head>
        <title>Catálogo - BackOffice</title>
        <link rel="stylesheet" type="text/css" media="all" href="style.css"/>
        <meta charset="utf-8">
        <?php
            include 'dbcon.inc';
        ?>
    </head>

    <body>

        <?php
            $nome = $_SESSION['nome'];
            $id = $_SESSION['id'];
            $poder = $_SESSION['poder'];
        ?>

        <h1 class="bvindo">Bem-Vindo, <u><?php echo $nome; ?></u></h1>

        <br><p>Opções de Administrador:</p>

        <br><p><a class="admin" href="mysql/produtos/list.php">Produtos</a></p>
        <?php

            if ($poder >= 5) {
                ?>
                    <p><a class="admin" href="mysql/categorias/list.php">Categorias</a></p>
                <?php
            }

            if ($poder >= 10) {
                ?>
                    <p><a class="admin" href="mysql/contas/list.php">Contas</a></p>
                <?php
            }
        ?>

        <div><a class="voltar" href="logout.php">Logout</a></div>

    </body>
</html>