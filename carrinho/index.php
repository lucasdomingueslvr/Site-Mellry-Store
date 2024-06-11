<?php
session_start();
include_once('../Back/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin'])) {
    die("Você precisa estar logado para ver o carrinho.");
}

$id_cliente = $_SESSION['id_cliente'];

$sql = "SELECT c.id, c.id_produto, c.tabela_produto, 
               CASE 
                   WHEN c.tabela_produto = 'tab_vestidos' THEN (SELECT nomeproduto FROM tab_vestidos WHERE id_vestidos = c.id_produto)
                   WHEN c.tabela_produto = 'tab_modaintima' THEN (SELECT nomeproduto FROM tab_modaintima WHERE id_modaintima = c.id_produto)
                   WHEN c.tabela_produto = 'tab_shorts' THEN (SELECT nomeproduto FROM tab_shorts WHERE id_shorts = c.id_produto)
                   WHEN c.tabela_produto = 'tab_camiseta' THEN (SELECT nomeproduto FROM tab_camiseta WHERE id_camiseta = c.id_produto)
               END AS nomeproduto,
               CASE 
                   WHEN c.tabela_produto = 'tab_vestidos' THEN (SELECT valor FROM tab_vestidos WHERE id_vestidos = c.id_produto)
                   WHEN c.tabela_produto = 'tab_modaintima' THEN (SELECT valor FROM tab_modaintima WHERE id_modaintima = c.id_produto)
                   WHEN c.tabela_produto = 'tab_shorts' THEN (SELECT valor FROM tab_shorts WHERE id_shorts = c.id_produto)
                   WHEN c.tabela_produto = 'tab_camiseta' THEN (SELECT valor FROM tab_camiseta WHERE id_camiseta = c.id_produto)
               END AS valor,
               CASE 
                   WHEN c.tabela_produto = 'tab_vestidos' THEN (SELECT promocao FROM tab_vestidos WHERE id_vestidos = c.id_produto)
                   WHEN c.tabela_produto = 'tab_modaintima' THEN (SELECT promocao FROM tab_modaintima WHERE id_modaintima = c.id_produto)
                   WHEN c.tabela_produto = 'tab_shorts' THEN (SELECT promocao FROM tab_shorts WHERE id_shorts = c.id_produto)
                   WHEN c.tabela_produto = 'tab_camiseta' THEN (SELECT promocao FROM tab_camiseta WHERE id_camiseta = c.id_produto)
               END AS promocao,
               CASE 
                   WHEN c.tabela_produto = 'tab_vestidos' THEN (SELECT imagem FROM tab_vestidos WHERE id_vestidos = c.id_produto)
                   WHEN c.tabela_produto = 'tab_modaintima' THEN (SELECT imagem FROM tab_modaintima WHERE id_modaintima = c.id_produto)
                   WHEN c.tabela_produto = 'tab_shorts' THEN (SELECT imagem FROM tab_shorts WHERE id_shorts = c.id_produto)
                   WHEN c.tabela_produto = 'tab_camiseta' THEN (SELECT imagem FROM tab_camiseta WHERE id_camiseta = c.id_produto)
               END AS imagem,
               CASE 
                   WHEN c.tabela_produto = 'tab_vestidos' THEN (SELECT tamanho FROM tab_vestidos WHERE id_vestidos = c.id_produto)
                   WHEN c.tabela_produto = 'tab_modaintima' THEN (SELECT tamanho FROM tab_modaintima WHERE id_modaintima = c.id_produto)
                   WHEN c.tabela_produto = 'tab_shorts' THEN (SELECT tamanho FROM tab_shorts WHERE id_shorts = c.id_produto)
                   WHEN c.tabela_produto = 'tab_camiseta' THEN (SELECT tamanho FROM tab_camiseta WHERE id_camiseta = c.id_produto)
               END AS tamanho
        FROM carrinho c
        WHERE c.id_cliente = ?";

$stmt = $conexao->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . htmlspecialchars($conexao->error));
}

$stmt->bind_param('i', $id_cliente);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belgrano&display=swap" rel="stylesheet">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    
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
        <div id="Carrinho">
            <div class="cabecalho-carrinho">
                <h2 class="title">Carrinho</h2>
                
                <button id="remove-all">
                    <img src="../assets/Delete.png" alt="imagem de uma lixeira">
                    REMOVER TODOS OS PRODUTOS
                </button>
            </div>

            <div class="container">
            <?php
            $total = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total += $row["promocao"];
                    echo '<div class="card" data-nome="' . $row["nomeproduto"] . '" data-tamanho="' . $row["tamanho"] . '">';
                    echo '<img class="img-produto" src="' . $row["imagem"] . '" alt="Imagem do Produto">';
                    echo '<p>' . $row["nomeproduto"] . '</p>';
                    echo '<p>Tamanho: ' . $row["tamanho"] . '</p>';
                    echo '<span>R$' . number_format($row["valor"], 2, ',', '.') . '</span>';
                    echo '<strong>R$' . number_format($row["promocao"], 2, ',', '.') . '</strong>';
                    echo '<button class="btn-remove" data-id="' . $row["id"] . '">Remover</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>Seu carrinho está vazio.</p>';
            }
            $stmt->close();
            ?>
            </div>

            <div class="buy-all">
                <div class="valor-total">
                    <h3>Valor total</h3>
                    <input id="valor" type="text" value="R$<?php echo number_format($total, 2, ',', '.'); ?>" readonly>
                </div>
                <button class="btn-buy-all">
                    COMPRAR TODOS
                    <img src="../assets/Whatsapp.png" alt="logo do whatsapp">
                </button>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>

    <script>
        document.getElementById('remove-all').addEventListener('click', function() {
            if (confirm('Tem certeza que deseja remover todos os produtos do carrinho?')) {
                window.location.href = 'remove_all.php';
            }
        });

        document.querySelectorAll('.btn-remove').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if (confirm('Tem certeza que deseja remover este produto do carrinho?')) {
                    window.location.href = 'remove_item.php?id=' + id;
                }
            });
        });

        document.querySelector('.btn-buy-all').addEventListener('click', function() {
            let products = [];
            document.querySelectorAll('.card').forEach(card => {
                const nome = card.getAttribute('data-nome');
                const tamanho = card.getAttribute('data-tamanho');
                products.push(`${nome} (Tamanho: ${tamanho})`);
            });

            const message = encodeURIComponent(`Olá, gostaria de comprar os seguintes produtos:\n\n${products.join('\n')}`);
            const whatsappURL = `https://wa.me/553497288709?text=${message}`; // Substitua pelo número do WhatsApp desejado
            window.open(whatsappURL, '_blank');
        });
    </script>
</body>
</html>
