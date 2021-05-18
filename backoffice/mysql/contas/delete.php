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

            if ($id == 1) {
                header("Location:list.php");
                die();
            }

            $update = true;
            $lista = mysqli_query($con, "SELECT * FROM `utilizadores` WHERE id=$id");

            if (mysqli_num_rows($lista) == 1 ) {
                $n = mysqli_fetch_array($lista);
                $nome = $n['nome'];
                $login = $n['login'];
                $pw = $n['pw'];
                $poder = $n['poder'];
            }
        }
    ?>


    <div class="form">
        <form method="POST">
            <label for="valor1">ID a alterar:</label>
            <input type="number" id="valor1" name="id" placeholder="ID..." value="<?php echo $id; ?>" required disabled>

            <label for="login">Novo login:</label>
            <input type="text" id="login" name="login" maxlenght="10" value="<?php echo $login; ?>" required disabled>

            <label for="valor1">Novo nome:</label>
            <input type="text" id="valor2" name="nome" maxlenght="75" value="<?php echo $nome; ?>" required disabled>

            <label for="poder">Novo nível de poder:</label>
            <input type="number" id="poder" name="poder" min="1" max="10" value="<?php echo $poder; ?>" required disabled>

            <input type="submit" value="Apagar" name="btnSubmit">
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
            $query = mysqli_query($con, "DELETE FROM `utilizadores` WHERE `id` = '$id'") or alerta("Erro na alteração de dados.");
            alerta("Registo apagado com sucesso");
            ob_start();
            header('Location: list.php');
            ob_end_flush();
        }

        function alerta($msg)
        {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        ?>
    </div>
</body>

</html>