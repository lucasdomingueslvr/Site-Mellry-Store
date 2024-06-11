<?php
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
        $(function(){
            $("#header").load("../base/header.php");
            $("#footer").load("../base/footer.php");
        });
    </script>
</head>
<body>
    <header id="header"></header>
    <main>
        <?php
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
                    $produto_nome = urlencode($row["nomeproduto"]);
                    $whatsapp_url = "https://api.whatsapp.com/send?phone=553491211727&text=Olá, estou interessado no produto: $produto_nome";

                    echo '<div class="produto">';
                    echo '<img src="' . $row["imagem"] . '" id="main-img">';
                    echo '<div class="descricao-produto">';
                    echo '<p>' . $row["nomeproduto"] . '</p>';
                    echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                    echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                    echo '<form action="">';
                    echo '<div class="buttons">';
                    echo '<button class="wpp-button"><a href="' . $whatsapp_url . '"  target="_blank">Comprar </a> <img src="../assets/Whatsapp.png" alt="logo do Whatsapp"></button>';
                    echo '<button><a href="../carrinho/index.php"><img src="../assets/car.png"></a></button>';
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
                    foreach ($valid_tables as $table_name => $id_column) {
                        $sql = "SELECT $id_column, valor, promocao, nomeproduto, tamanho, imagem FROM $table_name";
                        $result = $conexao->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row[$id_column] == $id && $table == $table_name) {
                                    continue; // Pular o produto atual
                                }
                                echo '<div class="card">';
                                echo '<img class="img-produto" src="' . $row["imagem"] . '" alt="Imagem do Produto">';
                                echo '<p>' . $row["nomeproduto"] . '</p>';
                                echo '<p>Tamanho: ' . $row["tamanho"] . '</p>';
                                echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                                echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                                echo '<div class="buttons">';
                                echo '<button class="btn-buy"><a href="../details/product_details.php?id=' . $row[$id_column] . '&table=' . $table_name . '">Comprar</a></button>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    else {
                        echo "Nenhum produto encontrado.";
                    }
                }
            }
            ?>
        </div>
    </div>
</main>
<footer id="footer"></footer>
</body>
</html>