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
            width: 100%;
            margin: 20px auto;
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
            text-align: center; 
        }

        td {
            padding-top: 8px;
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

    

        <?php

        if (isset($_GET["edit"])) {
            $id = $_GET["edit"];
            
            //Seleciona categoria
            $query_select = mysqli_query($con, "SELECT nome FROM `categorias` WHERE `id_categoria`='$id'");
            $linha_cat = mysqli_fetch_array($query_select);
            $categoria = $linha_cat["nome"];
            ?> <h1>Listagem dos registos da categoria: <?php echo $categoria; ?> </h1> <?php
            $query = mysqli_query($con, "SELECT * FROM `produtos` WHERE `id_categoria`='$id'") or die(alerta("Erro na seleção de dados."));
        } else {
            ?> <h1>Listagem dos produtos</h1> <?php
            $query = mysqli_query($con, "SELECT * FROM `produtos`") or die(alerta("Erro na seleção de dados."));
        }
        
        //Mostrar
        ?>
    <div class="php">

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Visível</th>
                    <th>Preço em Promoção</th>
                    <th>Categoria</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            
            <?php while ($linha = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['descricao']; ?></td>
                    <td><?php echo $linha['preco']; ?></td>
                    <td><img style="height:75px; width:75px;"src="<?php echo "../../../images/uploads/".$linha['imagem']; ?>"</td>
                    <td><?php if ($linha['visivel'] == 1) { echo "Sim";} else { echo "Não"; } ; ?></td>
                    <td><?php echo $linha['preco_promo']; ?></td>
                    <td>
                        <?php
                            $obter_cat = mysqli_query($con, "SELECT * FROM `categorias` WHERE `id_categoria` = '$linha[id_categoria]' ") or die(alerta("Erro na obteção de categorias"));
                            $linha_cat = mysqli_fetch_array($obter_cat);

                            echo "$linha_cat[nome]";
                        ?>
                    <td>
                        <a href="edit.php?edit=<?php echo $linha['id_produto']; ?>" class="edit_btn">Editar</a>
                    </td>
                    <td>
                        <a href="delete.php?edit=<?php echo $linha['id_produto']; ?>" class="del_btn" onclick="return confirm('Deseja apagar o produto <?php echo $linha['nome'] ?>?');">Apagar</a>
                    </td>
                </tr>
            <?php } ?>
                <tr style="height:75px;">
                    <td><a href="insert.php" class="insert_btn" >Inserir</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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