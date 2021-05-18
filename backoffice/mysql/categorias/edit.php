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
            $lista = mysqli_query($con, "SELECT * FROM `categorias` WHERE id_categoria=$id");

            if (mysqli_num_rows($lista) == 1 ) {
                $n = mysqli_fetch_array($lista);
                $nome = $n['nome'];
            }
        }
    ?>


    <div class="form">
        <form method="POST">
            <label for="valor1">ID a alterar:</label>
            <input type="number" id="valor1" name="id" placeholder="ID..." value="<?php echo $id; ?>" required disabled>

            <label for="valor1">Novo nome:</label>
            <input type="text" id="valor2" name="nome" maxlenght="75" placeholder="<?php echo $nome; ?>">

            <input type="submit" value="Alterar" name="btnSubmit">
        </form>
    </div>

    <!-- Botão Voltar -->
    <div>
        <a class="voltar" href="list.php">Voltar</a>
    </div>

    <div class="php">

        <?php
        if (isset($_POST["btnSubmit"])) {

            $nomen = $_POST["nome"];

            if(mysqli_query($con, "SELECT * FROM `categorias` WHERE `nome`= '$nomen'")->num_rows > 0) {
                alerta("Já existe um registo com esse nome.");
                die();
            }

            //Alterção de dados se existir
            $query = mysqli_query($con, "UPDATE `categorias` SET `nome`= '$nomen' WHERE `id_categoria` = '$id'") or alerta("Erro na alteração de dados.");
            alerta("Registo alterado com sucesso!");
            mysqli_close($con);
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