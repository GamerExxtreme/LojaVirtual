<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <?php
    include '../../dbcon.inc';
    ?>
    <style>
        body {
            background-color: #f2f2f2;

            /* Texto */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
        }

        .voltar {
            background-color: #21deff;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;

            /* Pos */
            position: absolute;
            bottom: 1%;
            left: 1%;

            /* Texto */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            text-decoration: none;
        }

        .voltar:hover {
            background-color: #1db4cf;
        }

        div.php {
            padding-left: 25%;
            padding-top: 50px;
            width: 50%;
            height: 50%;

            /* Texto */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
        }

        label {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
        }

        hr {
            width: 250%;
        }

        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border: none;
            border-radius: 5px;
        }
        .edit_btn {
            text-decoration: none;
            padding: 4px 7px;
            background: #2E8B57;
            color: white;
            border-radius: 3px;
        }

        .del_btn {
            text-decoration: none;
            padding: 4px 7px;
            color: white;
            border-radius: 3px;
            background: #800000;
        }

        .insert_btn {
            text-decoration: none;
            padding: 4px 7px;
            color: white;
            border-radius: 3px;
            background: #1a5bd5 ;
        }

        .msg {
            margin: 30px auto; 
            padding: 10px; 
            border-radius: 5px; 
            color: #3c763d; 
            background: #dff0d8; 
            border: 1px solid #3c763d;
            width: 50%;
            text-align: center;
        }

        table{
            width: 60%;
            margin: 30px auto;
            border-collapse: collapse;
            text-align: left;
        }

        tr {
            border-bottom: 1px solid #cbcbcb;
        }

        th, td{
            border: none;
            height: 32px;
            padding: 2px;
        }

        tr:hover {
            background: #dedede;
        }

    </style>
</head>

<body>

    <!-- Botão Voltar -->
    <div>
        <a class="voltar" href="../../backoffice.php">Voltar</a>
    </div>

        <h1>Listagem das contas</h1>

        <?php
        $query = mysqli_query($con, "SELECT * FROM `utilizadores`") or alerta("Erro na seleção de dados.");
        mysqli_close($con);
        //Mostrar
        ?>

    <div class="php">

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Poder&nbsp;&nbsp;</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            
            <?php while ($linha = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['login']; ?></td>
                    <td><?php echo $linha['poder']; ?></td>
                    <td>
                        <?php
                            if ($linha['id'] <> 1) {
                                ?>
                                    <a href="edit.php?edit=<?php echo $linha['id']; ?>" class="edit_btn">Editar</a>
                                <?php
                            }
                        ?>
                    </td>
                    <td>
                    <?php
                            if ($linha['id'] <> 1) {
                                ?>
                                    <a href="delete.php?edit=<?php echo $linha['id']; ?>" class="del_btn" onclick="return confirm('Deseja apagar o registo do(a) <?php echo $linha['nome'] ?>?');">Apagar</a>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
                <tr>
                    <td><a href="insert.php" class="insert_btn" >Inserir</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>


        <?php
        function alerta($msg)
        {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        ?>
    </div>
</body>

</html>