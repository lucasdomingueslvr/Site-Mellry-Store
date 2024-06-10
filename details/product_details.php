<?php
include_once('../Back/config.php');
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
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            // var_dump($id); // Adicione esta linha para depuração se necessário
            $sql = "SELECT id_vestidos, valor, promocao, nomeproduto, tamanho, imagem FROM tab_vestidos WHERE id_vestidos = $id";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="produto">';
                echo '<img src="' . $row["imagem"] . '" id="main-img">';
                echo '<div class="descricao-produto">';
                echo '<p>' . $row["nomeproduto"] . '</p>';
                echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                echo '<form action="">';
                echo '<div class="buttons">';
                echo '<button class="wpp-button"> Comprar <img src="../assets/Whatsapp.png" alt="logo do Whatsapp"></button>';
                echo '<button><a href="../carrinho/index.php"><img src="../assets/car.png"></a></button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                
            } else {
                echo 'Produto não encontrado.';
            }
        } else {
            echo 'ID do produto não fornecido.';
        }
        ?>

        <div id="similar">
            <p class="title">Produtos Similares</p>
            <hr>

           
            <div class="container">
            <?php
                $sql = "SELECT id_vestidos, valor, promocao, nomeproduto, tamanho, imagem FROM tab_vestidos";
                $result = $conexao->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row["id_vestidos"] == $id) {
                            continue; // Pular o produto atual
                        }
                        echo '<div class="card">';
                        echo '<img class="img-produto" src="' . $row["imagem"] . '" alt="Imagem do Produto">';
                        echo '<p>' . $row["nomeproduto"] . '</p>';
                        echo '<p>Tamanho: ' . $row["tamanho"] . '</p>';
                        echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                        echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                        echo '<div class="buttons">';
                        echo '<button class="btn-buy"><a href="../details/product_details.php?id=' . $row["id_vestidos"] . '">Comprar</a></button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Nenhum produto encontrado.";
                }
                ?>
            </div>
        </div>
    </main>
    <footer id="footer"></footer>
</body>
</html>
