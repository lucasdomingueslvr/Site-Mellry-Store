<?php
session_start();
include_once('../Back/config.php');

$valid_tables = [
    'tab_vestidos' => 'id_vestidos',
    'tab_modaintima' => 'id_modaintima',
    'tab_shorts' => 'id_shorts',
    'tab_camiseta' => 'id_camiseta'
];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belgrano&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>

    <link rel="shortcut icon" href="../assets/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../base/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function() {
            $("#header").load("../base/header.php");
            $("#footer").load("../base/footer.php");
        });
    </script>
</head>

<body>
    <header id="header"></header>
    <main>
        <?php

        // Verifica se o usuário está logado
        if (!isset($_SESSION['loggedin'])) {
            die("Você precisa estar logado para adicionar produtos ao carrinho.");
        }

        if (isset($_GET['id']) && isset($_GET['table'])) {
            $id = intval($_GET['id']);
            $table = $_GET['table'];

            if (array_key_exists($table, $valid_tables)) {
                $id_column = $valid_tables[$table];
                $sql = "SELECT $id_column, valor, promocao, nomeproduto, tamanho, imagem FROM $table WHERE $id_column = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    echo '<div class="produto" data-nome="' . $row["nomeproduto"] . '" data-tamanho="' . $row["tamanho"] . '">';
                    echo '<img src="' . $row["imagem"] . '" id="main-img">';
                    echo '<div class="descricao-produto">';
                    echo '<p>' . $row["nomeproduto"] . '</p>';
                    echo '<p>Tamanho: ' . $row["tamanho"] . '</p>';
                    echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                    echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                    echo '<form method="POST" action="carrinho.php">';
                    echo '<input type="hidden" name="id_produto" value="' . $id . '">';
                    echo '<input type="hidden" name="tabela_produto" value="' . $table . '">';
                    echo '<div class="buttons">';
                    echo '<button type="button" class="wpp-button" id="wpp-button">Comprar <img src="../assets/Whatsapp.png" alt="logo do Whatsapp"></button>';
                    echo '<button type="submit">Adicionar ao Carrinho</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo 'Produto não encontrado.';
                }
                $stmt->close();
            } else {
                echo 'Tabela inválida.';
            }
        } else {
            echo 'ID do produto ou tabela não fornecidos.';
        }
        ?>

        <div id="similar">
            <p class="title">Produtos Similares</p>
            <hr>
            <div class="container">
                <?php
                if (isset($id) && isset($table)) {
                    $id_column = $valid_tables[$table];
                    $sql = "SELECT $id_column, valor, promocao, nomeproduto, tamanho, imagem FROM $table WHERE $id_column != ?";
                    $stmt = $conexao->prepare($sql);
                    $stmt->bind_param('i', $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="card">';
                            echo '<img class="img-produto" src="' . $row["imagem"] . '" alt="Imagem do Produto">';
                            echo '<p>' . $row["nomeproduto"] . '</p>';
                            echo '<p>Tamanho: ' . $row["tamanho"] . '</p>';
                            echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                            echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                            echo '<div class="buttons">';
                            echo '<button class="btn-buy"><a href="../details/product_details.php?id=' . $row[$id_column] . '&table=' . $table . '">Comprar</a></button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Nenhum produto encontrado.";
                    }
                    $stmt->close();
                }
                ?>
            </div>
        </div>
    </main>
    <footer id="footer"></footer>

    <script>
        document.getElementById('wpp-button').addEventListener('click', function() {
            const produto = document.querySelector('.produto');
            const nome = produto.getAttribute('data-nome');
            const tamanho = produto.getAttribute('data-tamanho');
            const message = encodeURIComponent(`Olá, estou interessado no produto: ${nome} (Tamanho: ${tamanho})`);
            const whatsappURL = `https://api.whatsapp.com/send?phone=553497288709&text=${message}`;
            window.open(whatsappURL, '_blank');
        });
    </script>
</body>

</html>
