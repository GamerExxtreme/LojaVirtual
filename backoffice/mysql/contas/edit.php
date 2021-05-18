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

                alerta("Esse registo não pode ser editado.");
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
            <input type="text" id="login" name="login" maxlenght="10" placeholder="<?php echo $login; ?>" required>

            <label for="valor1">Novo nome:</label>
            <input type="text" id="valor2" name="nome" maxlenght="75" placeholder="<?php echo $nome; ?>">

            <label for="valor1">Nova password:</label>
            <input type="password" id="valor3" name="pw" maxlenght="15" placeholder="Nova password..." required>

            <label for="poder">Novo nível de poder:</label>
            <input type="number" id="poder" name="poder" min="1" max="10" placeholder="<?php echo $poder; ?>" required>

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

            $loginn = $_POST["login"];
            if (strlen($loginn) == 0) {
                $nomen = $nome;
            }
            $nomen = $_POST["nome"];
            $pwn = $_POST["pw"];
            $podern = $_POST["poder"];

            if(mysqli_query($con, "SELECT * FROM `utilizadores` WHERE `login`= '$loginn' AND `pw`='$pwn'")->num_rows > 0) {
                alerta("Já existe um registo com esse nome.");
                header("Refresh:0");
                die();
            }

            //Alterção de dados se existir
            $query = mysqli_query($con, "UPDATE `utilizadores` SET `login`= '$loginn', `nome`= '$nomen', `pw`='$pwn', `poder`='$podern' WHERE `id` = '$id'") or alerta("Erro na alteração de dados.");
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