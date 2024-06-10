<?php
include_once('../Back/config.php');


// Consulta para vestidos
$sql_vestidos = "SELECT id_vestidos, valor, promocao, nomeproduto, tamanho, imagem FROM tab_vestidos";
$result_vestidos = $conexao->query($sql_vestidos);

// Consulta para moda íntima
$sql_modaintima = "SELECT id_modaintima, valor, promocao, nomeproduto, tamanho, imagem FROM tab_modaintima";
$result_modaintima = $conexao->query($sql_modaintima);

// Consulta para shorts
$sql_shorts = "SELECT id_shorts, valor, promocao, nomeproduto, tamanho, imagem FROM tab_shorts";
$result_shorts = $conexao->query($sql_shorts);

// Consulta para camisetas
$sql_camisetas = "SELECT id_camiseta, valor, promocao, nomeproduto, tamanho, imagem FROM tab_camiseta";
$result_camisetas = $conexao->query($sql_camisetas);

$sql = "SELECT id_vestidos, valor, promocao, nomeproduto, tamanho, imagem FROM tab_vestidos";
$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belgrano&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <div class="produtos">
            <?php
            // Função para exibir produtos
            function displayProducts($result, $title, $ids) {
                if ($result->num_rows > 0) {
                    echo "<h2>$title</h2>";
                    echo '<div class="container">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '<img class="img-produto" src="' . $row["imagem"] . '" alt="Imagem do Produto">';
                        echo '<p>' . $row["nomeproduto"] . '</p>';
                        echo '<p>Tamanho: ' . $row["tamanho"] . '</p>';
                        echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                        echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                        echo '<div class="buttons">';
                        echo '<button class="btn-buy"><a href="../details/product_details.php?id=' . $row[$ids] . '">Comprar</a></button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo "<h2>$title</h2>";
                    echo "Nenhum produto encontrado.";
                }
            }

            // Exibir produtos de cada tabela
            displayProducts($result_vestidos, "Vestidos", "id_vestidos");
            displayProducts($result_modaintima, "Moda Íntima", "id_modaintima");
            displayProducts($result_shorts, "Shorts", "id_shorts");
            displayProducts($result_camisetas, "Camisetas", "id_camiseta");
            ?>
        </div>
    </main>
        <footer id="footer"></footer>
</body>
</html>
